<?php

namespace App\Repositories;

use App\Models\Specialization;
use DB;
use Exception;
use Symfony\Component\HttpKernel\Exception\UnprocessableEntityHttpException;

/**
 * Class SpecializationRepository
 *
 * @version August 2, 2021, 10:19 am UTC
 */
class SpecializationRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'name',
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
        return Specialization::class;
    }

    /**
     * @param  array  $input
     * @return bool
     */
    public function store(array $input): bool
    {
        try {
            DB::beginTransaction();
            $input['status'] = (isset($input['status'])) ? 1 : 0;
            $specialization = Specialization::create($input);
            if (isset($input['icon']) && ! empty('icon')) {
                $specialization->addMedia($input['icon'])->toMediaCollection(Specialization::ICON, config('app.media_disc'));
            }
            DB::commit();
            return true;
        } catch (Exception $e) {
            DB::rollBack();
            throw new UnprocessableEntityHttpException($e->getMessage());
        }
    }

    /**
     * @param  array  $input
     * @return bool
     */
    public function update($input, $specialization): bool
    {
        try {
            DB::beginTransaction();
            $input['status'] = (isset($input['status'])) ? 1 : 0;
            $specialization->update($input);
            if (isset($input['icon']) && ! empty('icon')) {
                $specialization->clearMediaCollection(Specialization::ICON);
                $specialization->media()->delete();
                $specialization->addMedia($input['icon'])->toMediaCollection(Specialization::ICON, config('app.media_disc'));
            }
            DB::commit();
            return true;
        } catch (Exception $e) {
            DB::rollBack();
            throw new UnprocessableEntityHttpException($e->getMessage());
        }
    }
}
