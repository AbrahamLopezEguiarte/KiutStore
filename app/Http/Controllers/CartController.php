<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\CartItem;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function addCart()
    {
        $cart = Cart::firstOrNew([
            'user_id' => Auth::id()
        ]);

        $cart->save();

        return $cart->id;
    }

    public function addCartItem($product_id, $cart_id)
    {
        $cartItem = CartItem::firstOrNew([
            'cart_id' => $cart_id,
            'product_id' => $product_id
        ]);
        
        $cartItem->quantity = $cartItem->quantity + 1;
        $cartItem->save();

        return $cartItem;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    //funciona bien
    public function index()
    {
        $cart = Cart::where('user_id', Auth::id())->get();
        $cartItems = Cart::find($cart[0]->id)->cart_items;
        
        return view('shop.shopping-cart', compact('cartItems'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

     //"Undefined variable $cartItems"
    public function store(Request $request)
    {
        $cart_id = $this->addCart();

        $this->addCartItem($request->product_id, $cart_id);

        $cartItems = Cart::find($cart_id)->cart_items;
        
        return view('shop.shopping-cart', compact('cartItems'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
