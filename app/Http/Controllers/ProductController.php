<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    // Rādīt visu produktu sarakstu
    public function index()
    {
        $products = Product::all();
        return view('products.index', compact('products'));
    }

    // Forma jauna produkta izveidei
    public function create()
    {
        return view('products.create');
    }

    // Saglabāt jaunu produktu
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'price' => 'required|numeric|min:0',
            'quantity' => 'required|integer|min:0',
            'expiration_date' => 'required|date',
            'status' => 'required|in:available,unavailable',
        ]);

        Product::create($request->all());

        return redirect()->route('products.index')->with('success', 'Produkts veiksmīgi izveidots!');
    }

    // Rādīt konkrētu produktu
    public function show(Product $product)
    {
        return view('products.show', compact('product'));
    }

    // Forma produkta rediģēšanai
    public function edit(Product $product)
    {
        return view('products.edit', compact('product'));
    }

    // Atjaunināt produktu
    public function update(Request $request, Product $product)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'price' => 'required|numeric|min:0',
            'quantity' => 'required|integer|min:0',
            'expiration_date' => 'required|date',
            'status' => 'required|in:available,unavailable',
        ]);

        $product->update($request->all());

        return redirect()->route('products.index')->with('success', 'Produkts veiksmīgi atjaunināts!');
    }

    // Dzēst produktu
    public function destroy(Product $product)
    {
        $product->delete();

        return redirect()->route('products.index')->with('success', 'Produkts veiksmīgi dzēsts!');
    }

    public function increase(Product $product)
    {
        $product->increaseQuantity();

        return response()->json([
            'quantity' => $product->quantity,
            'message' => 'Produkts palielināts par 1 vienību.'
        ]);
    }

    public function decrease(Product $product)
    {
        $product->decreaseQuantity();

        return response()->json([
            'quantity' => $product->quantity,
            'message' => 'Produkts samazināts par 1 vienību.'
        ]);
    }




}
