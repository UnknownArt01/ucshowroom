<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class vehicle extends Model
{
    use HasFactory;
    protected $guarded = [
        'id'
    ];


    //menanadakan vehicle dapat memiliki banyak order
    public function order()
    {
        return $this->hasMany(Order::class);
    }
}
