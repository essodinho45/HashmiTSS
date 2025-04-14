<?php

namespace App\Livewire;

use Livewire\Component;

class DashboardActions extends Component
{
    public function createTicket()
    {
        $this->redirect(route('tickets.create'), navigate: true);
    }

    public function render()
    {
        return view('livewire.dashboard-actions');
    }
}
