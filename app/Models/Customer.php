<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected $fillable = ['name', 'mobile', 'address'];
    public function tickets()
    {
        return $this->hasMany(Ticket::class);
    }
}
