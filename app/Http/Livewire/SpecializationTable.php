<?php

namespace App\Http\Livewire;

use App\Models\Specialization;
use Illuminate\Database\Eloquent\Builder;
use Rappasoft\LaravelLivewireTables\Views\Column;

class SpecializationTable extends LivewireTableComponent
{
    protected $model = Specialization::class;
    public bool $showButtonOnHeader = true;
    public string $buttonComponent = 'specializations.components.add_button';
    protected $listeners = ['refresh' => '$refresh','resetPage'];
    public string $statusFilter = '';

    public function configure(): void
    {
        $this->setPrimaryKey('id')
            ->setDefaultSort('created_at', 'desc')
            ->setQueryStringStatus(false);

        $this->setThAttributes(function (Column $column) {
            if ($column->isField('id')) {
                return [
                    'class' => 'text-center td-icon'
                ];
            }
            if (in_array($column->getField(),['charges','status'],true)) {
                return [
                    'class' => 'text-end',
                ];
            }
            return [];
        });
    }

    /**
     * @return array
     */
    public function columns(): array
    {
        return [
            Column::make(__('messages.front_service.icon'), 'id')->view('specializations.components.icon'),
            Column::make(__('messages.common.name'), 'name')->view('specializations.components.name')
                    ->sortable()
                    ->searchable(),
            Column::make(__('messages.doctor.status'), 'status')->view('specializations.components.status')->sortable(),
            Column::make(__('messages.common.action') , 'id')->view('specializations.components.action'),
        ];
    }

    /**
     * @return Builder
     */
    public function builder(): Builder
    {
        //return Specialization::query();
        $query = Specialization::with(['media'])->select('specializations.*');

        $query->when($this->statusFilter !== '' && $this->statusFilter != Specialization::ALL,
            function (Builder $query) {
                $query->where('status', $this->statusFilter);
            });

        return $query;
    }
}
