@extends('admin.master')
@section('content')
<div class="content-body">
    <div class="container-fluid">

        <div class="row page-titles">
            <ol class="breadcrumb">
                <li class="breadcrumb-item active"><a href="javascript:void(0)">Danh Sách Danh Mục</a></li>
                <li class="breadcrumb-item"><a href="javascript:void(0)">Danh Mục</a></li>
            </ol>
        </div>
        <!-- row -->


        <div class="row">

            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title"> Danh Mục</h4>
                    </div>
                    <div class="card-body">
                    @if(session()->has('status'))
                        
                        <div class="alert alert-success">
                            {{ session()->get('status') }}
                        </div>
                        @endif
                        <div class="table-responsive">
                            <table id="example3" class="display" style="min-width: 845px">
                                <thead>
                                    <tr>
                                        <th>Stt</th>
                                        <th>Tên</th>
                                        <th>Trạng Thái</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($product as $key => $cate)
                                    <tr>

                                        <td>{{$key}}</td>
                                        <td>{{$cate ->name}}</td>

                                        <td>
                                          
                                            <a href="{{route('editpro', $cate->id)}}" >
                                                    
                                                        <button type="submit" class="btn btn-danger btn-sm">Sửa</button>
                                                  
                                                </a>   
                                                <a href="{{route('delpro',$cate->id)}}" >
                                                    
                                                    <button type="submit" class="btn btn-danger btn-sm">xóa</button>
                                              
                                            </a>   
                                                   
                                              
                                            </div>
                                        </td>
                                        @endforeach
                                    </tr>

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