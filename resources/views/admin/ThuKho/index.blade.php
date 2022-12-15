@extends('admin.master')
@section('content')
    <div class="content-body">
        <div class="container-fluid">

            <div class="row page-titles">
                <ol style="display: flex ; justify-content: space-between;" class="breadcrumb ">
                    <li class="breadcrumb-item bg-danger active"><a href="{{ route('thukho.add') }}">Nhập</a></li>
                    <li class="breadcrumb-item bg-success "><a href="{{ route('thukho.xuat.add') }}">Xuất</a></li>
                </ol>
            </div>
            <!-- row -->


            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Danh sách</h4>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                @if (Session::has('notice'))
                                    <div  class="alert alert-success bg-success text-white">{{ Session::get('notice') }}</div>
                                @endif
                                <table class="table table-responsive-md">
                                    <thead>
                                        <tr>
                                            <th style="width:80px;"><strong>#</strong></th>
                                            <th><strong>Mã</strong></th>
                                            <th><strong>Thời gian nhập</strong></th>
                                            <th><strong>Sản phẩm</strong></th>
                                            <th><strong>Số lượng</strong></th>
                                            <th><strong>Tổng tiền</strong></th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($notes as $key => $note)
                                        @if ($note->status == 1)
                                        <tr>
                                            <td><strong>{{$key}}-nhập</strong></td>
                                            <td>{{$note->code}}</td>
                                            <td>{{$note->created_at}}</td>
                                            <td>{{$note->product->name}}</td>
                                            <td><span class="badge light badge-success">{{$note->amount}}</span></td>
                                            <td>{{$note->price}}VN Đ</td>
                                            <td>
                                                <div class="d-flex">
                                                    <a href="{{ route('thukho.edit', ['id'=>$note->id]) }}" class="btn btn-primary shadow btn-xs sharp me-1"><i class="fas fa-pencil-alt"></i></a>
                                                    <a href="{{ route('thukho.delete', ['id'=>$note->id]) }}" class="btn btn-danger shadow btn-xs sharp"><i class="fa fa-trash"></i></a>
                                                </div>
                                            </td>
                                        </tr>
                                        @else
                                        <tr>
                                            <td><strong>{{$key}}-xuất</strong></td>
                                            <td>{{$note->code}}</td>
                                            <td>{{$note->created_at}}</td>
                                            <td>{{$note->product->name}}</td>
                                            <td><span class="badge light badge-success">{{$note->amount}}</span></td>
                                            <td>{{$note->price}}VN Đ</td>
                                            <td>
                                                <div class="d-flex">
                                                    <a href="{{ route('thukho.edit', ['id'=>$note->id]) }}" class="btn btn-primary shadow btn-xs sharp me-1"><i class="fas fa-pencil-alt"></i></a>
                                                    <a href="{{ route('thukho.delete', ['id'=>$note->id]) }}" class="btn btn-danger shadow btn-xs sharp"><i class="fa fa-trash"></i></a>
                                                </div>
                                            </td>
                                        </tr>
                                        @endif
                                        @endforeach

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
    </div>
@endsection
