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
            Column::make("Employee", "employee.name"),
            Column::make("Type", "type"),
            Column::make("Customer", "customer_name"),
            Column::make("Customer mobile", "customer_mobile"),
            Column::make("Customer address", "customer_address"),
            // Column::make("Note", "note"),
            DateColumn::make('Created At', 'created_at')
                ->outputFormat('Y-m-d'),
            DateColumn::make('Closed At', 'closed_at')
                ->outputFormat('Y-m-d'),
        ];
    }
}
