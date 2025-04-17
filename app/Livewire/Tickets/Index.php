<?php

namespace App\Livewire\Tickets;

use Livewire\Component;

class Index extends Component
{
    public function createTicket()
    {
        $this->redirect(route('tickets.create'), navigate: true);
    }
    public function render()
    {
        return view('livewire.tickets.index');
    }
}
