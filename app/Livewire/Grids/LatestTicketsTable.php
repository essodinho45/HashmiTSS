<?php

namespace App\Livewire\Grids;

use Illuminate\Database\Eloquent\Builder;
use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use Rappasoft\LaravelLivewireTables\Views\Columns\DateColumn;
use Rappasoft\LaravelLivewireTables\Views\Columns\ButtonGroupColumn;
use Rappasoft\LaravelLivewireTables\Views\Columns\LinkColumn;
use Rappasoft\LaravelLivewireTables\Views\Columns\WireLinkColumn;
use App\Models\Ticket;

class LatestTicketsTable extends DataTableComponent
{
    protected $model = Ticket::class;

    public function configure(): void
    {
        $this->setPrimaryKey('id');
        $this->setColumnSelectStatus(false);
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

            return [];
        });
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
            Column::make("Id", "id")->attributes(fn() => ['class' => 'hidden']),
            Column::make(__("Employee"), "employee.name"),
            Column::make(__("Type"), "type")
                ->format(fn($row) => __($row)),
            Column::make(__("Customer"), "customer_name")
                ->searchable(),
            Column::make(__("Customer mobile"), "customer_mobile")
                ->searchable(),
            Column::make(__("Customer address"), "customer_address"),
            // Column::make("Note", "note"),
            Column::make("Note", "note")->attributes(fn() => ['class' => 'hidden']),
            DateColumn::make(__('Created At'), 'created_at')
                ->outputFormat('Y-m-d'),
            Column::make(__('Closed At'), 'closed_at')
                ->format(fn($row) => $row ? date('Y-m-d', strtotime($row)) : ''),
            ButtonGroupColumn::make(__('Actions'))
                ->attributes(function ($row) {
                    return [
                        'class' => 'space-x-2',
                    ];
                })
                ->buttons([
                    LinkColumn::make(__('Action'))
                        ->title(fn($row) => __('Print'))
                        ->location(fn($row) => route('tickets.print', $row->id))
                        ->attributes(fn($row) => [
                            'class' => 'underline text-blue-500 hover:no-underline',
                            'target' => '_blank'
                        ]),
                ]),
            WireLinkColumn::make('')
                ->title(fn($row) => __('Close'))
                ->action(fn($row): string => 'closeTicket("' . $row->id . '")')
                ->attributes(function ($row) {
                    $added_class = '';
                    if ($row->closed_at != null)
                        $added_class .= ' hidden';
                    return [
                        'class' => 'underline text-blue-500 hover:no-underline' . $added_class,
                    ];
                }),
        ];
    }
    public function closeTicket($id)
    {
        $ticket = Ticket::findOrFail($id);
        $ticket->closed_at = now();
        $ticket->save();
    }
}
