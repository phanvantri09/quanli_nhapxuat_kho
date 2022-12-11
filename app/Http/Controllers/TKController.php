<?php

namespace App\Http\Controllers;
use App\Models\Note;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TKController extends Controller
{
    //Thủ kho
    //trí code quản lí kho, thống kê báo cáo,
    public function home(){
        $notes = Note::all();
        $products = Product::all();
        return view('admin.Thukho.index', compact('products', 'notes'));
    }
    public function add(){
        $NCC = User::where('level', 2)->get();
        $products = Product::all();
        return view('admin.Thukho.add', compact('products','NCC'));
    }
    public function addPost(Request $request){
        $product = Product::find($request->id_product);
        $id_user_cc = $product->id_user_cc;

        $id_user_create = Auth::user()->id;
        $price = $request->amount * $product->price;

        $note = new Note();
        $note->id_user_create = $id_user_create;
        $note->amount = $request->amount;
        $note->code = $note->randomCode(1);
        $note->id_product = $request->id_product;
        $note->id_user_cc = $id_user_cc;
        $note->price = $price;
        $note->save();
        return redirect()->route('thukho');
    }
}
