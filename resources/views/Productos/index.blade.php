<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>CRUD</title>
</head>
<body>
    <h1>CRUD principal</h1>
    <a href="{{route('productos.create')}}">Agregar un nuevo producto</a>
    <table>
        <tr>
            <th>ID</th>
            <th>Producto</th>
            <th>Descripción</th>
            <th>Precio</th>
            <th>Detalles</th>
        </tr>
        @foreach($productos as $producto)
        <tr>
            <td>{{$producto -> id}}</td>
            <td>{{$producto -> name}}</td>
            <td>{{$producto -> description}}</td>
            <td>{{$producto -> price}}</td>
            <td>
                <a href="{{route('productos.show', $producto->id)}}">Ver detalle</a><br>
            </td>
        </tr>
        @endforeach
    </table>
    {{ $productos->links() }}
</body>
</html>