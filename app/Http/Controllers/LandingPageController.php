<?php

namespace App\Http\Controllers;

use App\Models\Product;

use Illuminate\Http\Request;

class LandingPageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Product::select('category')->distinct()->get();
        $products = Product::get();

        return view('landing-page')->with([
            'categories' => $categories,
            'products' => $products
        ]);
    }
   
}
