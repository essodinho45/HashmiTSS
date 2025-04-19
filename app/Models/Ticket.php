<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    protected $fillable = ['employee_id', 'customer_id', 'type', 'note', 'created_by'];
    public function employee()
    {
        return $this->belongsTo(Employee::class);
    }
    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }
    function products()
    {
        return $this->belongsToMany(Product::class);
    }
}
