@extends('client.layout')
@section('content')
    <div class="site-section">
        <div class="container">
            <div class="bg-light py-3">
                <div class="container">
                  <div class="row">
                    <div class="col-md-12 mb-0"><a href="index.html">Home</a> <span class="mx-2 mb-0">/</span> <strong class="text-black">Tank Top T-Shirt</strong></div>
                  </div>
                </div>
              </div>  
          
              <div class="site-section">
                <div class="container">
                  <div class="row">
                    <div class="col-md-6">
                      <img src="{{ asset('uploads/product/' . $product->image) }}" alt="Image" class="img-fluid">
                    </div>
                    <div class="col-md-6">
                      <h2 class="text-black">{{$product->name}}</h2>
                      <p>{{$product->description}}</p>
                      <p><strong class="text-primary h4">{{$product->sale_price}}</strong></p>

                      <div class="mb-5">
                        <div class="input-group mb-3" style="max-width: 120px;">
                        {{-- <div class="input-group-prepend">
                          <button class="btn btn-outline-primary js-btn-minus" type="button">&minus;</button>
                        </div>
                        <input type="text" class="form-control text-center" value="1" placeholder="" aria-label="Example text with button addon" aria-describedby="button-addon1">
                        <div class="input-group-append">
                          <button class="btn btn-outline-primary js-btn-plus" type="button">&plus;</button>
                        </div> --}}
                      </div>
          
                      </div>
                      <p><a href="{{route('add.cart', $product->id)}}" class="buy-now btn btn-sm btn-primary">Add To Cart</a></p>
          
                    </div>
                  </div>
                </div>
              </div>

        </div>
    </div>
@endsection
