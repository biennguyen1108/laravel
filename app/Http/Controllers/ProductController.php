<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    public function create()
    {
        return view('products.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'price' => 'required|numeric',
            'brand' => 'required',
            'description' => 'required',
            'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $product = Product::create([
            'name' => $request->input('name'),
            'price' => $request->input('price'),
            'brand' => $request->input('brand'),
            'description' => $request->input('description'),
        ]);

        if ($request->hasFile('public')) {
            $image = $request->file('public');
            $filename = time() . '.' . $
            $image->getClientOriginalExtension();
            $path = $request->file('img')->storeAs('public/img', $filename);
            $product->image = $filename;
            $product->save();
        }

        return redirect()->route('products.index')->with('success', 'Thêm sản phẩm thành công!');
    }


    public function index()
    {
        $products = Product::all();

        return view('products.index', ['products' => $products]);
    }

    // public function create()
    // {
    //     return view('products.create');
    // }

    // public function store(Request $request)
    // {
    //     $request->validate([
    //         'name' => 'required',
    //         'price' => 'required|numeric',
    //         'brand' => 'required',
    //         'description' => 'required',
    //         'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
    //     ]);

    //     $product = Product::create([
    //         'name' => $request->input('name'),
    //         'price' => $request->input('price'),
    //         'brand' => $request->input('brand'),
    //         'description' => $request->input('description'),
    //     ]);

    //     if ($request->hasFile('image')) {
    //         $image = $request->file('image');
    //         $filename = time() . '.' . $image->getClientOriginalExtension();
    //         $path = $request->file('image')->storeAs('public/images', $filename);
    //         $product->image = $filename;
    //         $product->save();
    //     }

    //     return redirect()->route('products.index')->with('success', 'Thêm sản phẩm thành công!');
    // }
}
