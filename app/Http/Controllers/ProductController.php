<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Tag;
use Illuminate\Http\Request;

class ProductController extends Controller
{

    public function index()
    {
        $products = Product::all();
        return view('products.index', compact('products'));
    }


    public function create()
    {
        return view('products.create');
    }


    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'price' => 'required|numeric|min:0',
            'quantity' => 'required|integer|min:0',
            'expiration_date' => 'required|date',
            'status' => 'required|in:available,unavailable',
            'tags' => 'nullable|array',
            'tags.*' => 'string|max:50',
        ]);

        $product = Product::create($request->all());

        if ($request->has('tags')) {
            $tagIds = [];
            foreach ($request->tags as $tagName) {
                $tag = Tag::firstOrCreate(['name' => $tagName]);
                $tagIds[] = $tag->id;
            }
            $product->tags()->sync($tagIds);
        }

        return redirect()->route('products.index')->with('success', 'Produkts veiksmīgi izveidots!');
    }


    public function show(Product $product)
    {
        return view('products.show', compact('product'));
    }


    public function edit(Product $product)
    {
        return view('products.edit', compact('product'));
    }


    public function update(Request $request, Product $product)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'price' => 'required|numeric|min:0',
            'quantity' => 'required|integer|min:0',
            'expiration_date' => 'required|date',
            'status' => 'required|in:available,unavailable',
            'tags' => 'nullable|string', // CSV no hidden input
        ]);

        $product->update($request->only(['name','description','price','quantity','expiration_date','status']));

        // Birkas
        $tagNames = $request->input('tags', '');
        $tagIds = [];

        if (!empty($tagNames)) {
            $tagNames = array_filter(explode(',', $tagNames));
            foreach ($tagNames as $name) {
                $tag = Tag::firstOrCreate(['name' => $name]);
                $tagIds[] = $tag->id;
            }
        }

        // Sync aizvieto visas vecās birkas ar jauno sarakstu
        $product->tags()->sync($tagIds);

        return redirect()->route('products.show', $product)
            ->with('success', 'Produkts un birkas veiksmīgi atjaunināti!');
    }






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
