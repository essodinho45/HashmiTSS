<?php

namespace App\Livewire\Grids;

use Illuminate\Database\Eloquent\Builder;
use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use Rappasoft\LaravelLivewireTables\Views\Columns\CountColumn;
use App\Models\Employee;

class ActiveEmployeesTable extends DataTableComponent
{
    protected $model = Employee::class;

    public function configure(): void
    {
        $this->setPrimaryKey('name');
        $this->setSearchStatus(false);
        $this->setColumnSelectStatus(false);
        // $this->setPerPageVisibilityStatus(false);
        $this->setPaginationVisibilityStatus(false);
        $this->setPaginationDisabled();
    }
    public function builder(): Builder
    {
        return Employee::query();
    }
    public function columns(): array
    {
        return [
            Column::make("Name"),
            CountColumn::make('Tickets')
                ->setDataSource('tickets'),
        ];
    }
}
