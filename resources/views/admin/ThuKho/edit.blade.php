@extends('admin.master')
@section('content')
    <div class="content-body">
        <div class="container-fluid">

            <div class="row page-titles">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item active"><a href="javascript:void(0)">Danh Sách User</a></li>
                    <li class="breadcrumb-item"><a href="javascript:void(0)">User</a></li>
                </ol>
            </div>
            <!-- row -->


            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Form Validation</h4>
                        </div>
                        <div class="card-body">
                            <div class="form-validation">
                                <form action="{{ route('thukho.editPost') }}" method="post" enctype="multipart/form-data" class="needs-validation" novalidate="">
                                    @csrf
                                    <div class="row">
                                        <div class="col-xl-12">
                                            <div class="mb-3 row">
                                                <label class="col-lg-4 col-form-label" for="validationCustom06">Sản phẩm
                                                    <span class="text-danger">*</span>
                                                </label>
                                                <div class="col-lg-6">
                                                    <input type="text" class="form-control" value="{{ $products->name }}"  min="0" id="validationCustom06" disabled>
                                                    <input type="hidden" value="{{ $note->id_product }}"  name="id_product" >
                                                    <input type="hidden" value="{{ $note->id }}"  name="id" >
                                                </div>
                                            </div>
                                            <div class="mb-3 row">
                                                <label class="col-lg-4 col-form-label" for="validationCustom06">Số lượng
                                                    <span class="text-danger">*</span>
                                                </label>
                                                <div class="col-lg-6">
                                                    <input type="number" class="form-control" value="{{$note->amount}}" name="amount" min="0" id="validationCustom06" required="">
                                                    <div class="invalid-feedback">
                                                        Please enter a Currency.
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="mb-3 row">
                                                <div class="col-lg-8 ms-auto">
                                                    <button type="submit" class="btn btn-primary">Tạo</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
    </div>
@endsection
