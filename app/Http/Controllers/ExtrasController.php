<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ExtrasController extends Controller
{
    public function index()
    {
        $products = Product::all();
        return view('extras.index', compact('products'));
    }
}