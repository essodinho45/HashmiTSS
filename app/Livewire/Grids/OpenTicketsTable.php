<?php

namespace App\Livewire\Grids;

use Illuminate\Database\Eloquent\Builder;
use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use Rappasoft\LaravelLivewireTables\Views\Columns\DateColumn;
use Rappasoft\LaravelLivewireTables\Views\Columns\WireLinkColumn;
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
        $this->setThAttributes(function (Column $column) {
            if ($column->isField('id') || $column->isField('note')) {
                return [
                    'class' => 'hidden',
                ];
            }
            return ['default' => true];
        });
        $this->setTdAttributes(function (Column $column, $row, $columnIndex, $rowIndex) {
            if ($column->isField('id') || $column->isField('note')) {
                return [
                    'class' => 'hidden',
                ];
            }
            return ['default' => true];
        });
    }
    public function builder(): Builder
    {
        return Ticket::query()
            ->with('employee');
    }
    public function columns(): array
    {
        return [
            Column::make("Id", "id"),
            Column::make(__("Employee"), "employee.name"),
            Column::make(__("Type"), "type"),
            Column::make(__("Customer"), "customer_name"),
            // Column::make("Customer mobile", "customer_mobile"),
            // Column::make("Note", "note"),
            DateColumn::make(__('Created At'), 'created_at')
                ->outputFormat('Y-m-d'),
            // WireLinkColumn::make('')
            //     ->title(fn($row) => __('Close'))
            //     ->action(fn($row): string => 'closeTicket("' . $row->id . '")')
            //     ->attributes(function ($row) {
            //         $added_class = '';
            //         if ($row->closed_at != null)
            //             $added_class .= ' hidden';
            //         return [
            //             'class' => 'underline text-blue-500 hover:no-underline' . $added_class,
            //         ];
            //     }),

            // Column::make("Updated at", "updated_at"),
        ];
    }
    public function closeTicket($id)
    {
        $ticket = Ticket::findOrFail($id);
        $ticket->closed_at = now();
        $ticket->save();
    }
}
