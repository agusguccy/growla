{{-- usa la plantilla de template.blade.php --}}
@extends('template')


{{--se completa la parte del @yield en el template pasandole el nombre de la pagina, en este caso, home.--}}
@section('pageTitle','Nuestras birras')
@section('contenidoPrincipal')

<style media="screen">
* {
  box-sizing: border-box;
}
input[type=text]{
  width: 50%;
}
.titulo{
  color:white;
  text-align: center;
  letter-spacing: 3px;
  font-size: 35px;
  text-shadow: 3px 1px grey;
}
.alineador{

width: 100%;

  display: flex;
  flex-direction: row;
  justify-content: center;

  align-items: center;

}
.container-general{

font-family: 'Oswald', sans-serif;



  border-radius: 10px;

  display: flex;
  flex-direction:column;
  flex-wrap: nowrap;
  justify-content: space-between;
  align-items: center;


  /*align-content: center;*/

  /*justify-content: center;

  align-items: center;*/

}
.formulario-birras{

  color:black;
   width: 100%;
  margin: 20px;


  border-radius: 5px;
background-color: rgba(255, 191, 196, 1);
  text-align: center;
  justify-content: center;
  box-shadow: 8px 8px 2px rgba(162, 100, 107, 0.6);;
  padding: 10px;
}
.label{
  font-size: 15px;
  color: black;
}
.input{
  border-left: 3px solid black;
  border-right:3px solid black;
  border-radius: 5px;
  color: #FFFFFF;
  margin-top: 5px;
  background-color: rgba(0, 0, 0, 0.6);
width: 50%;
}
input[type=file]{
  background-color: inherit;
  color:black;
  border: none;
  padding-top: 5px;
  width: 50%;
  justify-content: center
}
.select {
  width: 50%;
  border-left: 3px solid black;
  border-right:3px solid black;
  border-radius: 5px;
  color: #FFFFFF;
  margin-top: 5px;
  background-color: rgba(0, 0, 0, 0.6);


}
.textarea{
  width: 100%;
  border-left: 3px solid black;
  border-right:3px solid black;
  border-radius: 5px;
  color: #FFFFFF;
  margin-top: 5px;
  background-color: rgba(0, 0, 0, 0.6);
  height: ;

}

.botonera{
  background-color: rgba(38, 163, 61, 1);
  width: 50%;
  padding: 15px 10px;
  font-size: 20px;
  border-radius: 5px;
  border: none;
  text-align: center;
  padding: 10px;

}
.botonera:hover{
  box-shadow: 4px 4px grey;
}
@media only screen and (min-width: 768px) {
.container-general {
  height: 800px;
  justify-content: center;
}

.titulo{
  font-size: 40px;
}
.input{
  height: 30px;
}
.select{
  height: 30px;
}
}
@media only screen and (min-width: 1200px) {

.container-general{
  height: 920px;
}

.titulo{
  font-size: 50px;
}
.formulario-birras{
  height: 920px;
}
 }

</style>


<div class="alineador">
<form class="" action="/new-beer" method="post" enctype="multipart/form-data">
{{csrf_field()}}
<div class="container-general">

<h1 class="titulo">Agregar Cerveza</h1>

        <div class="formulario-birras">
          <div class="casilleros">
          <label class="label" for="">Tipo de birra</label><br>
<input type="text" class="input" name="type" value="{{ old('type') }}">
          </div>
          @if ($errors->has("type"))
        <span class="invalid-feedback" role="alert">
            <strong>{{$errors->first("type")}}</strong>
        <br>
        </span>
          @endif
        </div>

        <div class="formulario-birras">
          <div class="casilleros">
          <label class="label" for="">IBUs</label><br>
            <input class="input" type="number" name="IBUs" value="{{ old('IBUs') }}">
          </div>
          @if ($errors->has("IBUs"))
          <span class="invalid-feedback" role="alert">
            <strong>{{$errors->first("IBUs")}}</strong>
          <br>
          </span>
          @endif
        </div>
        <div class="formulario-birras">
          <div class="casilleros">
          <label class="label" for="">Alcohol Content</label><br>
<input type="number" class="input" name="alcohol_content" value="">
          </div>
          @if ($errors->has("alcohol_content"))
          <span class="invalid-feedback" role="alert">
            <strong>{{$errors->first("alcohol_content")}}</strong>
          <br>
          </span>
          @endif
        </div>
        <div class="formulario-birras">
          <div class="casilleros">
          <label class="label" for="">Color</label><br>
        <select class="select" name="color_id">
          <option value="">Elegi un color</option>
          @foreach ($colors as $color)
            <option
              value="{{$color->id}}"
              {{ old('color_id', "") == $color->id ? "selected" : null }}
            >{{$color->color}}</option>
          @endforeach
        </select>
          </div>
        </div>
        <div class="formulario-birras">
          <div class="casilleros">
          <label class="label" for="">Imagen</label><br>
<input type="file" name="image" value="">
          </div>
          @if ($errors->has("image"))
          <span class="invalid-feedback" role="alert">
            <strong>{{$errors->first("image")}}</strong>
          <br>
          </span>
          @endif
        </div>
        <div class="formulario-birras">
          <div class="casilleros-desc">
          <label class="label" for="">Description</label><br>
<textarea class="textarea" name="description" rows="2" cols="50">{{ old('description') }}</textarea>
          </div>
          @if ($errors->has("description"))
         <span class="invalid-feedback" role="alert">
            <strong>{{$errors->first("description")}}</strong>
         <br>
         </span>
          @endif
          </div>

<button type="submit" class="botonera" name="button">Agregar Birra</button>

          </div>
        </div>

</form>
@endsection
