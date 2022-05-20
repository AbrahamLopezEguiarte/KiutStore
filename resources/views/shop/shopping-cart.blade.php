@extends('layouts.master')

@section('title')
    KiutStore | Carrito 
@endsection

@section('content')

    @section('cart')
        <div class="price">{{$cart->price}}</div>
    @endsection
    @section('page')
        <li><a href="{{route('landingpage')}}">Inicio</a></li>
        <li><a href="{{route('shop.index')}}">Tienda</a></li>
        <li class="active"><a href="{{redirect('/')}}">Páginas</a>
    @endsection
    <!-- Breadcrumb Section Begin -->
    <section class="breadcrumb-option">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb__text">
                        <h4>Carrito de Compra</h4>
                        <div class="breadcrumb__links">
                            <a href="{{route('landingpage')}}">Inicio</a>
                            <a href="{{route('shop.index')}}">Tienda</a>
                            <span>Carrito de Compra</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Section End -->

    <!-- Shopping Cart Section Begin -->
    <section class="shopping-cart spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="shopping__cart__table">
                        <table>
                            <thead>
                                <tr>
                                    <th>Producto</th>
                                    <th>Cantidad</th>
                                    <th>Total</th>
                                </tr>
                            </thead>
                            <tbody>
                                <script>
                                    if ( window.history.replaceState ) {
                                        window.history.replaceState( null, null, window.location.href );
                                    }
                                </script>
                                @foreach($cartItems as $item)
                                <tr>                                    
                                    <td class="product__cart__item">
                                        
                                        <div class="product__cart__item__pic">
                                            <img src="{{$item->product->image}}" alt="" width="150" height="200">
                                        </div>
                                        <div class="product__cart__item__text">
                                            <h6>{{$item->product->name}}</h6>
                                            <h5>${{$item->product->price}}</h5>
                                        </div>
                                    </td>
                                    <td class="quantity__item">
                                        <div class="quantity">
                                                <form id="modifyForm" action="{{ route('cart.update', $item) }}" method="POST">
                                                    @csrf
                                                    @method('PATCH')
                                                    <div class="pro-qty-2">
                                                        <input type="text" name="quantity" value="{{ $item->quantity }}">
                                                    </div>
                                                    <button type="submit" class="btn btn-light"> Actualizar Carrito
                                                        <i class="fa fa-spinner"></i>
                                                    </button>
                                                </form>                                                
                                        </div>
                                    </td>
                                    <!-- Agregar precio total del carro -->
                                    <td class="cart__price">{{ $item->price }}</td>                                    
                                    <td class="cart__close"> 
                                        <form action="{{ route('cart.destroy', $item) }}" method="POST">
                                            @csrf
                                            @method('delete')
                                            <button class="btn btn-light" type="submit"><i class="fa fa-close"></i></button>
                                        </form>                                                                          
                                    </td>                                                                        
                                </tr>
                                @endforeach                                
                            </tbody>
                        </table>
                    </div>
                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-6">
                            <div class="continue__btn">
                                <a href="{{route('shop.index')}}">Continuar Comprando</a>
                            </div>
                        </div>                        
                    </div>
                </div>
                <br>
                <div class="col-lg-4">
                    <div class="cart__total">
                        <h6>Cart total</h6>
                        <ul>
                            <li>Subtotal <span>{{ $cart->price }}</span></li>
                            <li>Total <span>{{ $cart->price }}</span></li>
                        </ul>
                        <a href="#" class="primary-btn">Pagar</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Shopping Cart Section End -->

@endsection