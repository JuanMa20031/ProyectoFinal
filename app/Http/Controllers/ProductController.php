<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductRequest;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all();
        return view('products.index', compact('products'));
    }

    public function create()
    {
        $categories = Category::all();
        return view('products.create', compact('categories'));
    }

    public function store(ProductRequest $request)
    {
        $validatedData = $request->validated();

        if ($request->hasFile('photo')) {
            $imagePath = $request->file('photo')->store('public/photos');
            $validatedData['photo'] = Storage::url($imagePath);
        }

        Product::create($validatedData);

        return redirect()->route('products.index')->with('success', 'Producto creado exitosamente.');
    }

    public function show(Product $product)
    {
        return view('products.show', compact('product'));
    }

    public function edit(Product $product)
    {
        $categories = Category::all();
        return view('products.edit', compact('product', 'categories'));
    }

    public function update(ProductRequest $request, Product $product)
    {
        $validatedData = $request->validated();

        if ($request->hasFile('photo')) {
            $imagePath = $request->file('photo')->store('public/photos');
            $validatedData['photo'] = Storage::url($imagePath);
        }

        $product->update($validatedData);

        return redirect()->route('products.index')->with('success', 'Producto actualizado exitosamente.');
    }

    public function destroy(Product $product)
    {
        $product->delete();
        return redirect()->route('products.index')->with('success', 'Producto eliminado exitosamente.');
    }

    public function home()
    {
        $categories = Category::with('products')->get();
        return view('home', compact('categories'));
    }

    public function showBySlug($slug)
    {
        $product = Product::where('sku', $slug)->first();

        if (!$product) {
            return redirect()->route('products.index')->with('error', 'El producto no fue encontrado.');
        }

        return view('products.show', compact('product'));
    }
}
