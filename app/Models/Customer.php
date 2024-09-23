<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'tipo_id',
        'identification',
        'cellphone',
        'telephone',
        'email',
        'country',
        'city',
        'address',
        'status',
    ];

}
