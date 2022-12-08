<?php

namespace App\Models;

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
}
