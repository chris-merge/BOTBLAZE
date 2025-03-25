@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Editar Producto</h1>

        @if(session('error'))
            <p class="alert alert-danger">{{ session('error') }}</p>
        @endif

        <form action="{{ url('/editar_produc/'.$Producto->id) }}" method="POST">
            @csrf
            @method('PUT') <!-- Método PUT para actualización -->

            <div class="form-group">
                <label for="nombre_producto">Nombre del Producto:</label>
                <input type="text" name="nombre_producto" value="{{ $Producto->nombre_producto }}" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="descripcion">Descripción:</label>
                <input type="text" name="descripcion" value="{{ $Producto->descripcion }}" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="Cantidad">Cantidad:</label>
                <input type="number" name="Cantidad" value="{{ $Producto->Cantidad }}" class="form-control" required>
            </div>

            <button type="submit" class="btn btn-primary">Actualizar Producto</button>
        </form>
    </div>
@endsection
