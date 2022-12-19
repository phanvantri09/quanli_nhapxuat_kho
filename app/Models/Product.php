<?php

namespace App\Models;
use App\Models\Note;
use App\Models\User;
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

    public function note()
    {
        return $this->belongsTo(Note::class, 'id_product', 'id');
    }
    // public function id_user_cc($id_product)
    // {
    //     $user = User::where('id_')
    //     return $id_user_cc;
    // }
}
