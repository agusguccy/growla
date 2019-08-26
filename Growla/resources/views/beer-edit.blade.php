@extends('template')


{{--se completa la parte del @yield en el template pasandole el nombre de la pagina, en este caso, home.--}}
@section('pageTitle','Editor')


@section('contenidoPrincipal')
  <form  action="/beer-edit/{{$beer->id}}" method="post" enctype="multipart/form-data">
    @csrf
    @method('PATCH')
    <label for="">Tipo de cerveza</label>
    <br>
   <input type="text" name="type" value="{{$beer->type}}">
   <br>
   @if ($errors->has("type"))
   <span class="invalid-feedback" role="alert">
     <strong>{{$errors->first("type")}}</strong>
   <br>
   </span>
   @endif
   <label for="">Descripcion</label>
   <br>
   <textarea name="description" rows="8" cols="21"  >{{$beer->description}}</textarea>
   <br>
   @if ($errors->has("description"))
   <span class="invalid-feedback" role="alert">
     <strong>{{$errors->first("description")}}</strong>
   <br>
   </span>
   @endif
   <label for="">IBU</label>
   <br>
  <input type="number" name="IBUs" value="{{$beer->IBUs}}">
  <br>
  @if ($errors->has("IBUs"))
  <span class="invalid-feedback" role="alert">
    <strong>{{$errors->first("IBUs")}}</strong>
  <br>
  </span>
  @endif
  <label for="">Porcentaje de Alcohol</label>
  <br>
  <input type="number" name="alcohol_content" value="{{$beer->alcohol_content}}">
  <br>
  @if ($errors->has("alcohol_content"))
  <span class="invalid-feedback" role="alert">
    <strong>{{$errors->first("alcohol_content")}}</strong>
  <br>
  </span>
  @endif
{{--aca va la opcion de COLORS--}}

    <br>
    <label for="">Insertá una imagen</label>
    <br>
    <input type="file" name="image" value="">
    <br>
    @if ($errors->has("image"))
    <span class="invalid-feedback" role="alert">
      <strong>{{$errors->first("image")}}</strong>
    <br>
    </span>
    @endif
  <input type="submit" name="" value="Actualizar">

  </form>
@endsection
