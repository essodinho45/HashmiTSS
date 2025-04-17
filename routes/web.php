<?php

use App\Models\Ticket;
use Illuminate\Support\Facades\Route;
use Livewire\Volt\Volt;

Route::redirect('/', 'dashboard')->name('home');
// Route::get('/', function () {

//     return redirect('dashboard');
// })->name('home');

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::middleware(['auth'])->group(function () {
    Route::redirect('settings', 'settings/profile');

    Volt::route('settings/profile', 'settings.profile')->name('settings.profile');
    Volt::route('settings/password', 'settings.password')->name('settings.password');
    Volt::route('settings/appearance', 'settings.appearance')->name('settings.appearance');

    Volt::route('tickets', 'tickets.index')->name('tickets.index');
    Volt::route('tickets/create', 'tickets.create')->name('tickets.create');
    Volt::route('', 'tickets.print-ticket');
    Route::get('tickets/print-ticket/{id}', function ($id) {
        $ticket = Ticket::findOrFail($id);
        return view('livewire.tickets.print-ticket', compact('ticket'));
    })->name('tickets.print');

    Volt::route('employees', 'employees.index')->name('employees.index');
    Volt::route('employees/create', 'employees.create')->name('employees.create');

});

require __DIR__ . '/auth.php';
