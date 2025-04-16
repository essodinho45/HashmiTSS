<?php

namespace App\Livewire\Grids;

use Illuminate\Database\Eloquent\Builder;
use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use App\Models\Employee;

class EmployeesTable extends DataTableComponent
{
    protected $model = Employee::class;

    public function configure(): void
    {
        $this->setPrimaryKey('name');
        $this->setColumnSelectStatus(false);
    }
    public function builder(): Builder
    {
        return Employee::query();
    }
    public function columns(): array
    {
        return [
            Column::make(__('Name'), 'name'),
            Column::make(__('Mobile'), 'mobile'),
            Column::make(__('Type'), 'type'),
        ];
    }
}
