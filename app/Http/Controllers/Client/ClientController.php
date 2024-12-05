<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Banner;
use App\Models\Product;

class ClientController extends Controller
{
    public function index(){
        // bien banner lay gia tri tu bang Banner, su dung ham getBanner lay data co posision la top-banner o vi tri dau tien 
        $banner = Banner::getBanner('top-banner')->first();
        // bien gallery lay gia tri tu bang Banner, su dung ham getBanner lay data co posision la gallery
        $gallerys = Banner::getBanner('gallery')->get();

        $pros = Product::orderBy('id','DESC')->get();

        return view('client.index', compact('banner','gallerys','pros'));

        // return view('admin.product.index', compact('data'));
    }

    public function detail(Product $product){
        // $data = Category::orderBy('name','ASC')->select('id','name')->get();
        return view('client.detail',compact('product'));
    }

    public function order(){
        return view('client.order');
    }
}
