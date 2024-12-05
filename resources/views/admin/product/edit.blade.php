@extends('admin.layout')
@section('content')
<div class="col-md-6">
    <h5 class="mt-5">Sửa sản phẩm</h5>
    <hr>
    <form method="POST" action="{{route('product.update', $product->id)}}" enctype="multipart/form-data">
        @csrf @method('PUT')
        <div class="form-group row">
            <label for="inputEmail3" class="col-sm-3 col-form-label">Danh mục sản phẩm</label>
            <select name="category_id" class="form-control col-sm-3 col-form-label" id="">
                <option value="">Chọn 1</option>
                @foreach ($data as $item)
                    <option 
                        value="{{$item->id}}" 
                        {{$item->id == $product->category_id ? 'selected' : ''}}
                    >
                        {{$item->name}}
                    </option>                    
                @endforeach

            </select>
        </div>
        <div class="form-group row">
            <label for="inputEmail3" class="col-sm-3 col-form-label">Tên sản phẩm</label>
            <div class="col-sm-9">
                <input type="text" class="form-control" id="inputEmail3" name="name" value="{{$product->name}}">
            </div>
        </div>
        <div class="form-group row">
            <label for="inputEmail3" class="col-sm-3 col-form-label">Giá</label>
            <div class="col-sm-9">
                <input type="text" class="form-control" id="inputEmail3" name="price" value="{{$product->price}}">
            </div>
        </div>
        <div class="form-group row">
            <label for="inputEmail3" class="col-sm-3 col-form-label">Giá giảm</label>
            <div class="col-sm-9">
                <input type="text" class="form-control" id="inputEmail3" name="sale_price" value="{{$product->sale_price}}">
            </div>
        </div>
        <div class="form-group row">
            <label for="inputEmail3" class="col-sm-3 col-form-label">Ảnh sản phẩm</label>
            <div class="col-sm-9">
                <img src="{{ asset('uploads/product/' . $product->image) }}" alt="" width="30%">
                <input type="file" class="form-control" id="inputEmail3" name="img">
            </div>
        </div>
        <div class="form-group row">
            <label for="inputEmail3" class="col-sm-3 col-form-label">Mô tả</label>
            <div class="col-sm-9">
                <textarea name="description" class="form-control">{{$product->description}}</textarea>
            </div>
        </div>
        <fieldset class="form-group">
            <div class="row">
                <label for="inputPassword3" class="col-sm-3 col-form-label">Status</label>
                <div class="col-sm-9">
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="status" id="gridRadios1" value="1" {{$product->status == 1 ? "checked" : ''}}>
                        <label class="form-check-label" for="gridRadios1">Show</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="status" id="gridRadios2" value="0" {{$product->status == 0 ? "checked" : ''}}>
                        <label class="form-check-label" for="gridRadios2">Hide</label>
                    </div> 
                </div>
            </div>
        </fieldset>
        <div class="form-group row">
            <div class="col-sm-10">
                <button type="submit" class="btn  btn-primary">Sửa</button>
            </div>
        </div>
    </form>
</div>
@endsection
