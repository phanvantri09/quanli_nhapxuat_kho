<?php

namespace App\Models;
use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Note extends Model
{
    use HasFactory;
    protected $table = "note";
    public function randomCode($key){
        // 1nhập 2 xuất
        if($key == 1){
            $result = "nhap".rand(1000,9999);
        }else{
            $result = "xuat".rand(1000,9999);
        }
        return $result;
    }
    public function product()
    {
        // dd($this->hasOne(Product::class,'id_product','id'));
        return $this->hasOne(Product::class,'id','id_product');
    }
}
