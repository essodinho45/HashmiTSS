<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    protected $fillable = ['employee_id', 'type', 'customer_name', 'customer_mobile', 'note'];
    public function employee()
    {
        return $this->belongsTo(Employee::class);
    }
}
