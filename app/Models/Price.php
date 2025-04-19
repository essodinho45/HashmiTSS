<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Price extends Model
{
    protected $fillable = ['price', 'active'];
    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
