<?php

namespace App\Repositories;

use App\Http\Controllers\AppBaseController;
use App\Models\ServiceDiscountRates;
use App\Models\Doctor;
use App\Models\Service;
use App\Models\ServiceCategory;
use App\Models\Specialization;
use DB;
use Exception;
use Symfony\Component\HttpKernel\Exception\UnprocessableEntityHttpException;

/**
 * Class ServicesRepository
 *
 * @version August 2, 2021, 12:09 pm UTC
 */
class ServicesRepository extends AppBaseController
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'category_id',
        'name',
        'charges',
        'doctors',
        'status',
    ];

    /**
     * Return searchable fields
     *
     * @return array
     */
    public function getFieldsSearchable()
    {
        return $this->fieldSearchable;
    }

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Service::class;
    }

    /**
     * @param  array  $input
     * @return bool
     */
    public function store(array $input): bool
    {
        try {
            DB::beginTransaction();

            $input['charges'] = str_replace(',', '', $input['charges']);
            $input['status'] = (isset($input['status'])) ? 1 : 0;
            $services = Service::create($input);
            if (isset($input['doctors']) && ! empty($input['doctors'])) {
                $services->serviceDoctors()->sync($input['doctors']);
            }
            if (isset($input['specializations']) && ! empty($input['specializations'])) {
                $services->serviceSpecializations()->sync($input['specializations']);
            }
            if (isset($input['icon']) && ! empty('icon')) {
                $services->addMedia($input['icon'])->toMediaCollection(Service::ICON, config('app.media_disc'));
            }
            DB::commit();

            return true;
        } catch (Exception $e) {
            DB::rollBack();
            throw new UnprocessableEntityHttpException($e->getMessage());
        }
    }

    /**
     * @param $input
     * @param $service
     * @return bool
     */
    public function update($input, $service): bool
    {
        try {
            DB::beginTransaction();
            $input['charges'] = str_replace(',', '', $input['charges']);
            $input['status'] = (isset($input['status'])) ? 1 : 0;
            $service->update($input);
            $service->serviceDoctors()->sync($input['doctors']);
            $service->serviceSpecializations()->sync($input['specializations']);

            if (isset($input['icon']) && ! empty('icon')) {
                $service->clearMediaCollection(Service::ICON);
                $service->media()->delete();
                $service->addMedia($input['icon'])->toMediaCollection(Service::ICON, config('app.media_disc'));
            }

            if (isset($input['gallery']) && ! empty('gallery')) {
                $service->clearMediaCollection(Service::GALLERY);
                $service->media()->delete();
                foreach ($input['gallery'] as $file) {
                    $service->addMedia($file)->toMediaCollection(Service::GALLERY, config('app.media_disc'));
                }
            }

            if (isset($input['above_count_hourly']) && ! empty('above_count_hourly') && isset($input['rate_hourly']) && ! empty('rate_hourly')) {
                $rates = [];
                foreach ($input['above_count_hourly'] as $index => $value) {
                    $rates[] = [
                        'above_count' => $value,
                        'rate' => $input['rate_hourly'][$index],
                        'discount_type' => 'hourly',
                        'service_id' => $service->id,
                    ];
                }
                ServiceDiscountRates::where('service_id', $service->id)->where('discount_type', 'hourly')->delete();
                ServiceDiscountRates::insert($rates);
            }

            if (isset($input['above_count_daily']) && ! empty('above_count_daily') && isset($input['rate_daily']) && ! empty('rate_daily')) {
                $rates = [];
                foreach ($input['above_count_daily'] as $index => $value) {
                    $rates[] = [
                        'above_count' => $value,
                        'rate' => $input['rate_daily'][$index],
                        'discount_type' => 'daily',
                        'service_id' => $service->id,
                    ];
                }
                ServiceDiscountRates::where('service_id', $service->id)->where('discount_type', 'daily')->delete();
                ServiceDiscountRates::insert($rates);
            }
            DB::commit();
            return true;
        } catch (Exception $e) {
            DB::rollBack();
            throw new UnprocessableEntityHttpException($e->getMessage());
        }
    }

    /**
     * @return array
     */
    public function prepareData()
    {
        $data['specializations'] = Specialization::orderBy('name', 'ASC')->pluck('name', 'id');
        $data['doctors'] = Doctor::with('user')->get()->where('user.status', true)->pluck('user.full_name', 'id');

        return $data;
    }
}
