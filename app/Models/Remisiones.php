<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Remisiones extends Model
{
    use HasFactory;

    protected $fillable = [
        'customer_id',
        'sing',
        'sing_date',
        'comments'
    ];
}
