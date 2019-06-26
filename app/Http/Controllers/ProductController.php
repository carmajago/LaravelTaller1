<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{


    public function __construct()
{
    $this->middleware('auth');
}

    public function index()
    {
    
        return view('products',[
        'products' => Product::latest()->paginate()
        ]);
    }

    public function show($id)
    {
        $product = Product::find($id);

        return view('product', [ 'product' => $product]);
    }

    public function edit($id)
    {
        $product = Product::find($id);

        return view('EditProduct', [ 'product' => $product]);
    }

    public function update($id)
    {
        $product = Product::find($id);



        $product->name = $request->name;;
        return redirect()->back()->with('message', 'Actualizado con éxito');

    }


    public function create()
    {

        return view('CreateProduct');
    }


    public function store() {

        $product = request()->validate([
            'name' => 'required',
            'price' => 'required',
            'iva' => 'required',
            'quantity_available' => 'required',
            'min_amount' => 'required',
            'max_amount' => 'required',
      ]);

      $product['image'] = '/images/camiseta1.jpg';
        Product::create($product);
        
        return redirect()->route('products.index');
    }

    public function destroy($id){

        Product::findOrFail($id)->delete();
        return redirect()->route('products.index');
    }
}
