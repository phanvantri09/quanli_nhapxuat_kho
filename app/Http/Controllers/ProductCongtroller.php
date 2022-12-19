<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Product;

class ProductCongtroller extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $product = Product::all();

        return view('admin.product.index', compact('product'));
    }
    public function add()
    {
        return view('admin.product.add');
    }



    public function storeproduct(Request $request)
    {


        if (Product::create([
            'id_user_cc' => Auth::user()->id,
            'name' => $request->name,
            'code' => $request->code,
            'amount' => $request->amount,
            'price' => $request->price,
            
            'size' => implode(',', $request->size),
            'color' => implode(',', $request->color),


        ])) {
            return redirect()->route('addproduct')->with('success', 'Thêm thành công.');
        }
    }
    public function editpro($id)
    {

        $product = Product::find($id);

        return view('admin.product.editproduct', compact('product'));

       
    }
    public function update(Request $request, $id)
    {
       
        $request->validate([
            'name' => ['required:"xin cảm ơn"',  'max:255'],

        ]);

        $pro  =  Product::find($id);
        $pro->name = $request['name'];
        $pro->amount = $request['amount'];
        $pro->code = $request['code'];
        $pro->price = $request['price'];
        $pro->size = implode(',', $request->size);
        $pro->color = implode(',', $request->color);

        $pro->save();
        return redirect()->back()->with('massage', 'Cập Nhập Thành Công');
    }





    public function delpro($id)
    {
        Product::find($id)->delete();
        return redirect()->back()->with('status', 'Xóa Thành Công');
    }
  
}
