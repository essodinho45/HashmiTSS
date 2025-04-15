<?php

namespace App\Livewire\Employees;

use App\Models\Employee;
use Livewire\Component;
use App\Models\Ticket;

class Create extends Component
{
    public $name;
    public $mobile;
    public $type;
    public function create()
    {
        $validated = $this->validate([
            'type' => ['required', 'string'],
            'name' => ['required', 'string', 'max:255'],
            'mobile' => ['required', 'numeric'],
        ]);
        Employee::create($validated);
        $this->redirect(route('employees.index'), navigate: true);
    }
    public function render()
    {
        return view('livewire.employees.create');
    }
}
