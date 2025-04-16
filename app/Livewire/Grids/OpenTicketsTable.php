<?php

namespace App\Livewire\Grids;

use Illuminate\Database\Eloquent\Builder;
use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use Rappasoft\LaravelLivewireTables\Views\Columns\DateColumn;
use App\Models\Ticket;

class OpenTicketsTable extends DataTableComponent
{
    protected $model = Ticket::class;

    public function configure(): void
    {
        $this->setPrimaryKey('id');
        $this->setSearchStatus(false);
        $this->setColumnSelectStatus(false);
        $this->setPaginationVisibilityStatus(false);
        $this->setPaginationDisabled();
    }
    public function builder(): Builder
    {
        return Ticket::query()
            ->with('employee');
    }
    public function columns(): array
    {
        return [
            // Column::make("Id", "id"),
            Column::make(__("Employee"), "employee.name"),
            Column::make(__("Type"), "type"),
            Column::make(__("Customer"), "customer_name"),
            // Column::make("Customer mobile", "customer_mobile"),
            // Column::make("Note", "note"),
            DateColumn::make(__('Created At'), 'created_at')
                ->outputFormat('Y-m-d'),
            // Column::make("Updated at", "updated_at"),
        ];
    }
}
