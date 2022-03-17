<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Productos en inventario</title>
</head>
<body>
    <h1>Show</h1>
    <a href="{{route('productos.index')}}">Volver a la página principal</a>
    <table>
        <tr>
            <th>ID</th>
            <th>Producto</th>
            <th>Descripción</th>
            <th>Precio</th>
        </tr>
        <tr>
            <td>{{$producto -> id}}</td>
            <td>{{$producto -> name}}</td>
            <td>{{$producto -> description}}</td>
            <td>{{$producto -> price}}</td>
        </tr>
    </table>
</body>
</html>