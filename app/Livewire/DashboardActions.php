<?php

namespace App\Livewire;

use Livewire\Component;

class DashboardActions extends Component
{
    public function createTicket()
    {
        return redirect(route('tickets.create'));
    }

    public function render()
    {
        return view('livewire.dashboard-actions');
    }
}
