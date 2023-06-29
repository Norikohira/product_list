<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Product;

class ProductController extends Controller
{
    private $product;

    public function __construct(Product $product)
    {
        $this->product = $product;
    }

    public function create()
    {
        $all_products = $this->product->all();

        return view('list.create')
            ->with('all_products', $all_products);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'price' => 'required'
        ]);

        $product = new Product();
        $product->name = $validatedData['name'];
        $product->price = $validatedData['price'];
        $product->save();

        return redirect()->back();
    }


    public function edit($id)
    {
        $product = $this->product->find($id);

        return view('list.edit')
            ->with('product', $product);
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'price' => 'required'
        ]);

        $product = $this->product->findOrFail($id);
        $product->name = $validatedData['name'];
        $product->price = $validatedData['price'];
        $product->save();

        return redirect()->route('list.create');
    }


    public function destroy($id)
    {
        $product = $this->product->findOrFail($id);
        $product->delete();

        return redirect()->route('product.create');
    }


    public function destroyConfirmation($id)
    {
        $product = $this->product->findOrFail($id);
    
        return view('list.delete')->with('product', $product);
    }
    
}
