<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $table = "product";
    protected $fillable = [ 
        'id_user_cc',
        'name',
        'code',
        'amount',
        'price',
        'size',
        'color',
       
    ];

}
