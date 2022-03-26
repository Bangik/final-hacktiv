<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ProductController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $products = Product::orderBy('created_at', 'desc')->get();
        return view('admin.products.index', compact('products'));
    }

    public function create()
    {
        $categories = Category::all();
        return view('admin.products.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|max:255',
            'category_id' => 'required|integer',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'description' => 'required',
            'price' => 'required|integer',
            'massa' => 'required|integer',
            'status' => 'required|max:255',
        ]);

        $product = new Product;
        $product->name = $request->name;
        $product->slug = Str::slug($request->name);
        $product->category_id = $request->category_id;
        $product->description = $request->description;
        $product->price = $request->price;
        $product->massa = $request->massa;
        $product->status = $request->status;
        if($request->hasFile('image')){
            $imagee = $request->image;
            $image_name = time().'-'.$imagee->getClientOriginalName();
            $imagee->move('images/product/', $image_name);
            $image_path = 'images/product/'. $image_name;
            $product->image = $image_path;
        }
        $product->save();

        toastr()->success('Data berhasil ditambahkan');
        return redirect()->route('admin.products.index');
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required|max:255',
            'category_id' => 'required|integer',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'description' => 'required',
            'price' => 'required|integer',
            'massa' => 'required|integer',
            'status' => 'required|max:255',
        ]);

        $product = Product::findOrFail($id);
        $product->name = $request->name;
        $product->slug = Str::slug($request->name);
        $product->category_id = $request->category_id;
        if ($request->hasFile('image')) {
            if(file_exists($product->image)) {
                unlink($product->image);
            }
            $imagee = $request->image;
            $image_name = time().'-'.$imagee->getClientOriginalName();
            $imagee->move('images/product/', $image_name);
            $image_path = 'images/product/'. $image_name;
            $product->image = $image_path;
        }
        $product->description = $request->description;
        $product->price = $request->price;
        $product->massa = $request->massa;
        $product->status = $request->status;
        $product->save();

        toastr()->success('Data berhasil diubah');
        return redirect()->route('admin.products.index');
    }

    public function edit($id)
    {
        $product = Product::findOrFail($id);
        $categories = Category::all();
        return view('admin.products.edit', compact('product', 'categories'));
    }

    public function destroy($id)
    {
        $product = Product::findOrFail($id);
        if(file_exists($product->image)) {
            unlink($product->image);
        }
        $product->delete();

        toastr()->success('Data berhasil dihapus');
        return redirect()->route('admin.products.index');
    }
}
