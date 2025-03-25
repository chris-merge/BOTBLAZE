@extends('layouts.app')

@section('content')
<!-- CRUD de Producto -->
<div class="container">
    <div class="d-flex justify-content-around flex-wrap">
        <div class="card" style="width: 18rem; margin: 10px;">
            <div class="card-body">
                <h5 class="card-title">Productos</h5>
                <h6 class="card-subtitle mb-2 text-body-secondary">Gestión de productos:</h6>
                <p class="card-text">Control de ingresos de productos.</p>
                <center>
                <a class="btn btn-primary card-link" href="{{ url('/create') }}">Agregar Productos</a>
              
                </center>
            </div>
        </div>

        <!-- Visualización de productos -->
        <div class="card" style="width: 18rem; margin: 10px;">
            <div class="card-body">
                <h5 class="card-title">Visualización</h5>
                <h6 class="card-subtitle mb-2 text-body-secondary">Visualización de productos:</h6>
                <p class="card-text">Control de productos.</p>
                <center>
                <a  class="btn btn-primary" href="{{ url('/lista_produc') }}">Ir a Productos</a>

                </center>
            </div>
        </div>
    </div>
</div>

<!---->
@endsection
