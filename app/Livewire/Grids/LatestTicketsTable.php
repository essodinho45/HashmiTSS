<?php

namespace App\Livewire\Grids;

use Illuminate\Database\Eloquent\Builder;
use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use Rappasoft\LaravelLivewireTables\Views\Columns\DateColumn;
use App\Models\Ticket;

class LatestTicketsTable extends DataTableComponent
{
    protected $model = Ticket::class;

    public function configure(): void
    {
        $this->setPrimaryKey('id');
        $this->setColumnSelectStatus(false);
    }
    public function builder(): Builder
    {
        return Ticket::query()
            ->with('employee')
            ->orderByDesc('created_at');
    }
    public function columns(): array
    {
        return [
            // Column::make("Id", "id"),
            Column::make(__("Employee"), "employee.name"),
            Column::make(__("Type"), "type"),
            Column::make(__("Customer"), "customer_name"),
            Column::make(__("Customer mobile"), "customer_mobile"),
            Column::make(__("Customer address"), "customer_address"),
            // Column::make("Note", "note"),
            DateColumn::make(__('Created At'), 'created_at')
                ->outputFormat('Y-m-d'),
            DateColumn::make(__('Closed At'), 'closed_at')
                ->outputFormat('Y-m-d'),
        ];
    }
}
