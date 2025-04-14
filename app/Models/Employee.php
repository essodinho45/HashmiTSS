<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    protected $fillable = ['name', 'mobile', 'type'];
    public function tickets()
    {
        return $this->hasMany(Ticket::class);
    }
}
