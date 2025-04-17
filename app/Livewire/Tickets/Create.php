<?php

namespace App\Livewire\Tickets;

use App\Models\Employee;
use Livewire\Component;
use App\Models\Ticket;

class Create extends Component
{
    public $customer_name;
    public $customer_mobile;
    public $customer_address;
    public $note;
    public $type = 'enquire';
    public $employee_id = null;
    public $showEmployees = false;
    public function updatedType($value)
    {
        $this->showEmployees = ($value != 'enquire');
    }
    public function create()
    {
        try {
            $validated = $this->validate([
                'type' => ['required', 'string'],
                'customer_name' => ['required', 'string', 'max:255'],
                'customer_address' => ['required', 'string', 'max:255'],
                'customer_mobile' => ['required', 'numeric'],
                'note' => ['sometimes', 'string', 'max:255'],
                'employee_id' => ['nullable', 'integer', 'exists:employees,id'],
            ]);
            $validated['created_by'] = auth()->id();
            Ticket::create($validated);
            $this->redirect(route('tickets.index'), navigate: true);
        } catch (\Throwable $th) {
            dd($th);
        }
    }
    public function render()
    {
        $employees = Employee::query()->where('type', $this->type)->get();
        if (count($employees))
            $this->employee_id = $employees[0]->id;
        return view('livewire.tickets.create', ['employees' => $employees]);
    }
}
