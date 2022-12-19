@extends('admin.master')
@section('content')
<?php

$sizes = ['M', 'L', 'XL'];
$size = explode(',', $product->size);
$sizes = array_diff($sizes, $size);
$colors = ['vàng', 'đỏ', 'đen'];
$color = explode(',', $product->color);
$colors = array_diff($colors, $color);


?>
<div class="content-body">
    <div class="container-fluid">

        <div class="row page-titles">
            <ol class="breadcrumb">
                <li class="breadcrumb-item active"><a href="javascript:void(0)"> Product</a></li>
                <li class="breadcrumb-item"><a href="javascript:void(0)">Add Product</a></li>
            </ol>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">

                        @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                        @endif
                        @if(session()->has('massage'))

                        <div class="alert alert-success">
                            {{ session()->get('massage') }}
                        </div>
                        @endif
                        <div class="email-box ms-0 ms-sm-0 ms-sm-0">
                            <div class="p-0">
                                <a href="email-compose.html" class="btn btn-primary ">Add Product</a>
                            </div>
                            <br>
                            <div class="basic-form">


                                <form action="{{route('update',$product->id)}}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <div class="toolbar mb-4" role="toolbar">
                                    </div>

                                    <input type="hidden" name="views" class="form-control" value="0" required="">
                                    <div class="compose-content">
                                        <div class="mb-3 row">
                                            <label class="col-sm-1 col-form-label">Name</label>
                                            <div class="col-lg-6">
                                                <input type="name" name="name" class="form-control" value="{{$product ->name}}" placeholder="name" required="">
                                            </div>
                                        </div>

                                        <div class="col-xl-4 col-xxl-6 col-6">
                                            <label class="col-sm-1 col-form-label">Size</label>

                                            @foreach ($size as $item)
                                            <div class="form-check">
                                                <input class="form-check-input" name="size[]" type="checkbox" value="{{ $item }}" id="flexCheckDefault" checked>
                                                <label class="form-check-label" for="flexCheckDefault">
                                                    {{ $item }}
                                                </label>
                                            </div>
                                            @endforeach
                                            @foreach ($sizes as $ty)
                                            <div class="form-check">
                                                <input class="form-check-input" name="size[]" type="checkbox" value="{{ $ty }}" id="flexCheckDefault">
                                                <label class="form-check-label" for="flexCheckDefault">
                                                    {{ $ty }}
                                                </label>
                                            </div>
                                            @endforeach

                                        </div>
                                        
                                        <div class="col-xl-4 col-xxl-6 col-6">
                                            <label class="col-sm-1 col-form-label">Color</label>

                                            @foreach ($color as $item)
                                            <div class="form-check">
                                                <input class="form-check-input" name="color[]" type="checkbox" value="{{ $item }}" id="flexCheckDefault" checked>
                                                <label class="form-check-label" for="flexCheckDefault">
                                                    {{ $item }}
                                                </label>
                                            </div>
                                            @endforeach
                                            @foreach ($colors as $ty)
                                            <div class="form-check">
                                                <input class="form-check-input" name="colors[]" type="checkbox" value="{{ $ty }}" id="flexCheckDefault">
                                                <label class="form-check-label" for="flexCheckDefault">
                                                    {{ $ty }}
                                                </label>
                                            </div>
                                            @endforeach

                                        </div>
                                    </div>

                                    <div class="mb-3 row">
                                      
                                        <div class="mb-3 row">
                                            <label class="col-sm-1 col-form-label"> Price </label>
                                            <div class="col-lg-6">
                                                <input type="text" name="amount" value="{{$product ->amount}}"  class="form-control" required="">
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label class="col-sm-1 col-form-label"> Text </label>
                                            <div class="col-lg-6">
                                                <input type="number" name="price" value="{{$product ->price}}"  class="form-control" required="">
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label class="col-sm-1 col-form-label">code </label>
                                            <div class="col-lg-6">
                                                <input type="text" name="code" value="{{$product ->code}}" class="form-control" required="">
                                            </div>
                                        </div>


                                    </div>
                                    <div class="text-start mt-4 mb-3">
                                        <button class="btn btn-primary btn-sl-sm me-2" type="submit"><span class="me-2"><i class="fa fa-paper-plane"></i></span>Submit</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
    @endsection