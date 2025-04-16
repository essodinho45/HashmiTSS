<?php

namespace App\Livewire\Employees;

use App\Models\Employee;
use Livewire\Component;
use App\Models\Ticket;

class Create extends Component
{
    public $name;
    public $mobile;
    public $type = 'sales';
    public function create()
    {
        try {
            $validated = $this->validate([
                'type' => ['required', 'string'],
                'name' => ['required', 'string', 'max:255'],
                'mobile' => ['required', 'numeric'],
            ]);
            Employee::create($validated);
        }catch (\Exception $e){
            dd($e);
        }
        $this->redirect(route('employees.index'), navigate: true);
    }
    public function render()
    {
        return view('livewire.employees.create');
    }
}
