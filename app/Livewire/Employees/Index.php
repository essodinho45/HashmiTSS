<?php

namespace App\Livewire\Employees;

use Livewire\Component;

class Index extends Component
{
    public function createEmployee()
    {
        $this->redirect(route('employees.create'), navigate: true);
    }
    public function render()
    {
        return view('livewire.employees.index');
    }
}
