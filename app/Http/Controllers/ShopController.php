<?php

namespace App\Http\Controllers;

use App\Models\Product;

use Illuminate\Http\Request;

class ShopController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Product::select('category')->distinct()->get();
        $products = Product::paginate(12);

        $arr_count = array();
        foreach($categories as $category){
            $count = Product::where('category', $category->category)->count();
            $arr_count[$category->category] = $count;
        }
        
        return view('shop.shop-page')->with([
            'categories' => $categories,
            'products' => $products,
            'arr_count' => $arr_count
        ]);
    }

    /**

     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $product = Product::where('id', $id)->firstOrFail();

        return view('shop.shop-details')->with([
            'product' => $product,
        ]);
    }
}
