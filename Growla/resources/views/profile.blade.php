
@extends('template')

@section('pageTitle', 'Profile')

@section('contenidoPrincipal')



    <div class="container">
    		<div class="row">
    			<div class="col-md-6">
    				<br>
    				<h2>Hola {{ $user->name }} </h2>
    				<img src=" {{ $user->laImagenFinal }}" alt="imagen usuario">
    				<br><br>
    				<a href="#" class="btn btn-info"> {{ $user->email }} </a>
    				<a href="#" class="btn btn-danger">Editar información</a>
    			</div>
    		</div>
    	</div>
  @endsection
