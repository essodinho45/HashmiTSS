<?php

namespace App\Livewire\Tickets;

use Livewire\Component;
use App\Models\Ticket;

class Create extends Component
{
    public $customer_name;
    public $customer_mobile;
    public $customer_address;
    public $note;
    public $type;
    public function render()
    {
        return view('livewire.tickets.create');
    }
}
