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
    public $type;
    public $employee_id;
    public $employees;
    public function mount()
    {
        $this->employees = Employee::all();
    }
    public function updatedEmployee($value)
    {
        dd($value);
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
                'employee' => ['sometimes', 'string', 'exists:employees,id'],
            ]);
            Ticket::create($validated);
            $this->redirect(route('tickets.index'), navigate: true);
        } catch (\Throwable $th) {
            dd($th);
        }
    }
    public function render()
    {
        return view('livewire.tickets.create');
    }
}
