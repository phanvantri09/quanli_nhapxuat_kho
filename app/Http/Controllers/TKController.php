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
        $product->amount = $product->amount+$request->amount;
        $product->save();
        return redirect()->route('thukho')->with('notice',"Thành công");
    }

    public function edit($id){
        $note = Note::find($id);
        $NCC = User::where('level', 2)->get();
        $products = Product::find($note->id_product);
        return view('admin.Thukho.edit', compact('products','NCC','note'));
    }
    public function editPost(Request $request){
        $product = Product::find($request->id_product);
        $id_user_create = Auth::user()->id;
        $price = $request->amount * $product->price;

        $note = Note::find($request->id);
        if($note->status == 1){
            $note->id_user_create = $id_user_create;
            $note->amount = $request->amount;
            $note->id_product = $request->id_product;
            if($note->amount > $request->amount){
                $amount = $note->amount - $request->amount;
            }
            else{
                $amount = $request->amount - $note->amount;
            }
            $note->price = $price;
            $note->save();
            $product->amount = $product->amount+$amount;
            $product->save();
        }
        else{
            $accc = $product->amount+$note->amount;
            if($accc < $request->amount){
                return back()->with('notice',"Số lượng trong kho k đủ");
            }
            $note->id_user_create = $id_user_create;

            $note->amount = $request->amount;
            $note->id_product = $request->id_product;
            if($note->amount > $request->amount){
                $amount = $note->amount - $request->amount;
            }
            else{
                $amount = $request->amount - $note->amount;
            }
            $note->price = $price;
            $note->save();
            $product->amount = $product->amount+$amount;
            $product->save();
        }
        return redirect()->route('thukho')->with('notice',"Thành công");
    }

    public function xuat(){
        $NCC = User::where('level', 2)->get();
        $products = Product::all();
        return view('admin.Thukho.xuat', compact('products','NCC'));
    }
    public function xuat_by_id(Product $id){
        $NCC = User::where('level', 2)->get();
        return view('admin.Thukho.xuat', compact('NCC','id'));
    }
    public function xuatPost(Request $request){
        $product = Product::find($request->id_product);
        if($product->amount < $request->amount){
            return back()->with('notice',"Số lượng trong kho k đủ");
        }
        $id_user_cc = $product->id_user_cc;

        $id_user_create = Auth::user()->id;
        $price = $request->amount * $product->price;

        $note = new Note();
        $note->id_user_create = $id_user_create;
        $note->amount = $request->amount;
        $note->code = $note->randomCode(2);
        $note->id_product = $request->id_product;
        $note->id_user_cc = $id_user_cc;
        $note->price = $price;
        $note->status = 2;
        $note->save();
        $product->amount = $product->amount-$request->amount;
        $product->save();
        return redirect()->route('thukho')->with('notice',"Thành công");
    }

    public function delete(Note $id){
        $id->delete();
        return back()->with('notice',"đã xóa");
    }

}
