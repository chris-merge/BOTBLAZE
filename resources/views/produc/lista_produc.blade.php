<!-- resources/views/produc/lista_produc.blade.php -->
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Productos</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css">
</head>
<!-- Bootstrap CSS -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>

<body>
    <div class="container mt-5">
        <h1>Lista de Productos</h1>
        <div class="table-responsive"> 
    <br> 
    <table class="table">
        <thead class="bg-dark text-white">
            <tr>
                <th scope="col">Id</th>
                <th scope="col">Nombre de producto</th>
                <th scope="col">Descripcion</th>
                <th scope="col">Cantidad</th>
                <th scope="col">ACCIONES</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($Producto as $Producto)
            <tr class="">
                <td scope="row"> {{$Producto->id}}</td>
                <td>{{$Producto->nombre_producto}}</td>
                <td>{{$Producto->descripcion}}</td>
                <td>{{$Producto->Cantidad}}</td>
                   <!-- Button trigger modal -->
            <td>
            <a class="btn btn-info" href="{{ url('/producto/editar/'.$Producto->id) }}" class="btn btn-success">
                Editar
                </a>
                <a class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#modalEliminar{{ $Producto->id }}">
                Eliminar
                </a>
            </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
<!-- Modal de confirmación -->
<div class="modal fade" id="modalEliminar{{ $Producto->id }}" tabindex="-1" aria-labelledby="modalLabel{{ $Producto->id }}" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalLabel{{ $Producto->id }}">Confirmación de Eliminación</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p>¿Estás seguro de que deseas eliminar el producto <strong>{{ $Producto->nombre_producto }}</strong> con ID <strong>{{ $Producto->id }}</strong>?</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                <form action="{{ url('/eliminar_produc/' . $Producto->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Eliminar</button>
                </form>
            </div>
        </div>
    </div>
</div>
</div>
<center>
    <div>
        <a href="{{ url('/home') }}" class="btn btn-primary mt-3">Volver al Inicio</a>
    </div>
    </center>
</body>
</html>
