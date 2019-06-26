<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;


class CatalogController extends Controller
{
    public function index()
    {
    
        return view('catalog',[
        'products' => Product::latest()->paginate()
        ]);
    }
}
