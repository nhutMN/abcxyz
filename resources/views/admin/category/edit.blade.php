@extends('admin.layout')
@section('content')
<div class="col-md-6">
    <h5 class="mt-5">Sửa danh mục sản phẩm</h5>
    <hr>
    <form method="POST" action="{{route('category.update', $category->id)}}" >
        @csrf @method('PUT')
        <div class="form-group row">
            <label for="inputEmail3" class="col-sm-3 col-form-label">Tên danh mục</label>
            <div class="col-sm-9">
                <input type="text" class="form-control" id="inputEmail3" name="name" value="{{$category->name}}">
            </div>
        </div>
        <fieldset class="form-group">
            <div class="row">
                <label for="inputPassword3" class="col-sm-3 col-form-label">Status</label>
                <div class="col-sm-9">
                    <div class="form-check">
                        <input
                            class="form-check-input" type="radio" name="status" id="gridRadios1" value="1" 
                            {{$category->status == 1 ? 'checked' : ''}}
                        >
                        <label class="form-check-label" for="gridRadios1">Show</label>
                    </div>
                    <div class="form-check">
                        <input 
                            class="form-check-input" type="radio" name="status" id="gridRadios2" value="0"
                            {{$category->status == 0 ? 'checked' : ''}}
                        >
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
