<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class order extends Model
{
    use HasFactory;
    protected $guarded = [
        'id'
    ];


    //menandakan relasi dimana order dimiliki oleh customer dan vehicle

    public function Customer()
    {
        return $this->belongsTo(Customer::class);
    }

    public function Vehicle()
    {
        return $this->belongsTo(Vehicle::class);
    }
}
