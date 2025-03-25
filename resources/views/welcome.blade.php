

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravels dasfdsfds</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
        </head>
        <!-- Styles / Scripts -->
    
    </head>
    <body>
    @extends('layouts.app')
    @section('content')
<center>
<div class="container">
<div class="card" style="width: 18rem;">
<img src="{{ asset('imagenes/logo.png') }}" alt="Descripción de la imagen">
  <div class="card-body">
    <h5 class="card-title">BotBlaze </h5>
    <p class="card-text">Repositorio.</p>
    <a href="#" class="btn btn-primary">Ir a GitHub</a>
  </div>
</div>
</center>
@endsection
    </body>
</html>
