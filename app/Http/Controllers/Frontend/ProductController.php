<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\vc;
use Illuminate\Http\Request;
use App\Models\products;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // return view ('Frontend.shop');

        $products = Products::all(); // Retrieve all products from the database
        return view('Frontend.Product', compact('products'));
    }
   
}
