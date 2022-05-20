<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\CartItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class CartController extends Controller
{
    public function addCart()
    {
        $cart = Cart::firstOrNew([
            'user_id' => Auth::id()
        ]);

        $cart->save();

        return $cart;
    }

    public function addCartItem($product_id, $cart_id)
    {
        $cartItem = CartItem::firstOrNew([
            'cart_id' => $cart_id,
            'product_id' => $product_id
        ]);
        
        $cartItem->quantity = $cartItem->quantity + 1;
        $product_price = $cartItem->product->price;
        $cartItem->price = $cartItem->quantity * $product_price;
        $cartItem->save();

        //Incrementar precio del carrito
        $cart = Cart::where('id', '=', $cart_id)->get();
        $cart[0]['price'] = $cart[0]['price'] + $product_price;
        $cart[0]->save();

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
        $cart = $this->addCart();
        $cartItems = Cart::find($cart->id)->cart_items;
        
        return view('shop.shopping-cart')->with([
            'cartItems' => $cartItems,
            'cart' => $cart
        ]);
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


    public function store(Request $request)
    {
        $cart = $this->addCart();

        $this->addCartItem($request->product_id, $cart->id);

        $cartItems = Cart::find($cart->id)->cart_items;

        return redirect()->route('cart.index');
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
    public function update(Request $request, $item)
    {
        
        $qty = $request->quantity;
        $cartItem = CartItem::find($item);
        $cartItem->quantity = $qty;
        if($qty > 0){
            $product_price = $cartItem->product->price;
            $item_price = $cartItem->price;
            
            $cartItem->price = $cartItem->quantity * $product_price;
            
            $cartItem->save();

            //Modificar precio del carrito
            $cart = CartItem::find($cartItem->id)->cart;
            
            $cart->price = $cart->price - $item_price  + $cartItem->price;
            $cart->save();
        }
        else{
            return $this->destroy($item);
        }

        return redirect()->route('cart.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($item)
    {
        //Acualizar precio del carrito
        $cart = CartItem::find($item)->cart;
        $item_price = CartItem::find($item)->price;
        
        $cart->price = $cart->price - $item_price;
        $cart->save();

        CartItem::destroy($item);

        session()->flash('message');
        return redirect()->route('cart.index');
    }
}
