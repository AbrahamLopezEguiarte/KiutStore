<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    {{-- <link href="{{ asset('css/styles.css') }}" rel="stylesheet">
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet"> --}}
    <link href="https://fonts.googleapis.com/css2?family=Nunito+Sans:wght@300;400;600;700;800;900&display=swap"
    rel="stylesheet">

    <!-- Css Styles -->
    <link rel="stylesheet" href="css/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="css/font-awesome.min.css" type="text/css">
    <link rel="stylesheet" href="css/elegant-icons.css" type="text/css">
    <link rel="stylesheet" href="css/magnific-popup.css" type="text/css">
    <link rel="stylesheet" href="css/nice-select.css" type="text/css">
    <link rel="stylesheet" href="css/owl.carousel.min.css" type="text/css">
    <link rel="stylesheet" href="css/slicknav.min.css" type="text/css">
    <link rel="stylesheet" href="css/style.css" type="text/css">
    
    <script src="https://cdn.tailwindcss.com"></script>
    <title>CRUD</title>
</head>
<body class="mx-5 my-3">
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>
    <header class="header">
        <div class="header__top">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 col-md-5">
                        <div class="header__top__right">
                            <div class="header__top__links">
                                @if (!Auth::check())
                                    <a href="{{ route('login') }}">Iniciar sesión</a>
                                    <a href="{{ route('register') }}">Registrarse</a>
                                    <a href="#">FAQs</a>
                                @else
                                    <form method="POST" action="{{ route('logout') }}">
                                        @csrf
                                        <a href="{{ route('logout') }}" onclick="event.preventDefault();
                                        this.closest('form').submit(); " role="button">{{ __('Cerrar sesión') }}
                                        </a>
                                    </form>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <h1 class="text-center mt-2" style="font-size: 60px">Productos</h1>
    @if (session()->has('message'))
        <div class="bg-teal-100 border-t-4 border-teal-500 rounded-b text-teal-900 px-4 py-3 shadow-md" role="alert">
            <div class="flex">
            <div class="py-1"><svg class="fill-current h-6 w-6 text-teal-500 mr-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M2.93 17.07A10 10 0 1 1 17.07 2.93 10 10 0 0 1 2.93 17.07zm12.73-1.41A8 8 0 1 0 4.34 4.34a8 8 0 0 0 11.32 11.32zM9 11V9h2v6H9v-4zm0-6h2v2H9V5z"/></svg></div>
                <div>
                    <p class="font-bold">Eliminado exitoso</p>
                    <p class="text-sm">El producto deseado fue eliminado de forma exitosa.</p>
                </div>
            </div>
        </div>
    @endif
    <a href="{{url('/')}}" class="badge badge-pill badge-light mb-2">Regresar a la página principal</a>
    <a href="{{route('productos.create')}}" class="badge badge-pill badge-light mb-2">Agregar un nuevo producto</a>
    <form action="{{route('productos.restore')}}" method="POST">
        @csrf
        <button type="submit" class="badge badge-pill badge-light mb-2">Restaurar producto</button>
        <input type="number" name="product">
    <div class="col-xl-12 text-right">
        <a href="{{ route('download-pdf') }}" class="btn btn-success btn-sm">Export to PDF</a>
    </div>
    <table class="table table-striped">
    <thead class="thead-dark">
        <tr>
        <th scope="col">ID</th>
        <th scope="col">Producto</th>
        <th scope="col">Descripción</th>
        <th scope="col">Precio</th>
        <th scope="col">Categoría</th>
        <th scope="col">Imagen</th>
        <th scope="col">Detalles</th>
        </tr>
    </thead>
    <tbody>
        @foreach($productos as $producto)
        <tr>
        <th scope="row">{{$producto -> id}}</th>
        <td>{{$producto -> name}}</td>
        <td>{{$producto -> description}}</td>
        <td>{{$producto -> price}}</td>
        <td>{{$producto -> category}}</td>
        <td style="width: 8%" >
            <img class="img-thumbnail rounded"  src="{{$producto -> image}}" alt="">
        </td>
        <td>
            <a href="{{route('productos.show', $producto->id)}}" class="badge badge-pill badge-light mb-2">Ver detalle</a><br>
        </td>
        </tr>
        @endforeach
    </tbody>
    </table>
    {{ $productos->links() }}
</body>
</html>