<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Models\Category;


class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Product::orderBy('id','DESC')->paginate(20);
        return view('admin.product.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data = Category::orderBy('name','ASC')->get();
        return view('admin.product.create', compact('data'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|min:4|max:150|unique:products',
            'price' => 'required|numeric',
            'sale_price' => 'numeric|lte:price',
            'img' => 'required|file|mimes:jpg,jpeg,png,gif',
            'category_id' => 'required|exists:categories,id',
        ]);

        $data = $request->only('name','price','sale_price','status','description','category_id');

        $img_name = $request->img->hashName();
        $request->img->move(public_path('uploads/product'), $img_name);
        $data['image'] = $img_name;
        
        if(Product::create($data)){
            return redirect()->route('product.index');
        }

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        $data = Category::orderBy('name','ASC')->select('id','name')->get();
        return view('admin.product.edit', compact('data','product'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        $request->validate([
            'name' => 'required|min:4|max:150|unique:products,name,'.$product->id,
            'price' => 'required|numeric',
            'sale_price' => 'numeric|lte:price',
            'img' => 'required|file|mimes:jpg,jpeg,png,gif',
            'category_id' => 'required|exists:categories,id',
        ]);

        $data = $request->only('name','price','sale_price','status','description','category_id');

        if($request->has('img')){
            $img_name = $product->image;
            $img_path = public_path('uploads/product').'/'. $img_name;
            if(file_exists($img_path)) {
                unlink($img_path);
            }

            $img_name = $request->img->hashName();
            $request->img->move(public_path('uploads/product'), $img_name);
            $data['image'] = $img_name;
        }

        if($product->update($data)){
            return redirect()->route('product.index');
        }

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        $product->delete();
        return redirect()->route('product.index');
    }
}
