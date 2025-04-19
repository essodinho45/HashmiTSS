<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = ['name'];
    public function active_price()
    {
        return $this->hasOne(Price::class)->where('active', true);
    }
    function tickets()
    {
        return $this->belongsToMany(Ticket::class);
    }
}
