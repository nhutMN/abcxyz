@extends('admin.layout')
@section('content')
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h5>Sản phẩm</h5>
            </div>
            <div class="card-body table-border-style">
                <div class="table-responsive">
                    <div class="d-flex justify-content-between mb-4">
                        <button type="button" class="btn btn-success"><a href="{{route('product.create')}}">Thêm sản phẩm</a></button>
                        <div class="form-group d-flex justify-content-end">
                            <input type="text" class="">
                            <button type="button" class="btn btn-primary"><i class="fa fa-search"></i></button>
                        </div>
                    </div>
                    <table class="table table-dark">
                        <thead>
                            <tr>
                                <th>STT</th>
                                <th>Tên sản phẩm</th>
                                <th>Tên danh mục</th>
                                <th>Ảnh</th>
                                <th>Giá</th>
                                <th>Giá giảm</th>
                                <th>Status</th>
                                <th class="text-right">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data as $item)
                                <tr>
                                    <td>{{$item->id}}</td>
                                    <td>{{$item->name}}</td>
                                    <td>{{$item->cate->name}}</td>
                                    <td>
                                        <img src="{{ asset('uploads/product/' . $item->image) }}" alt="" width="50" height="50">
                                    </td>
                                    <td>{{$item->price}}</td>
                                    <td>{{$item->sale_price}}</td>
                                    <td>
                                        {{$item->status == 0 ? 'Hide' : 'Show'}}
                                    </td>
                                    <td class="text-right">
                                        <form 
                                            action="{{ route('product.destroy', $item->id) }}" 
                                            method="POST"
                                            onsubmit="return confirm('Bạn có chắc chắn muốn xóa')"
                                        >
                                            @csrf @method('DELETE')
                                            <a href="{{ route('product.edit', $item->id) }}" class="btn btn-sm btn-primary"><i
                                                    class="fa fa-edit"></i>Sửa</a>
                                            <button href="" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i>Xóa</button>
                                        </form>
                                    </td>
                                </tr>
                                {{ $data->links('pagination::bootstrap-4') }}
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    
@endsection
