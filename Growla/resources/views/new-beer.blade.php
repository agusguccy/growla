{{-- usa la plantilla de template.blade.php --}}
@extends('template')


{{--se completa la parte del @yield en el template pasandole el nombre de la pagina, en este caso, home.--}}
@section('pageTitle','Nuestras birras')
@section('contenidoPrincipal')

<form class="" action="/new-beer" method="post" enctype="multipart/form-data">
  {{csrf_field()}}
  <label for="">Tipo de cerveza</label>
<br>
 <input type="text" name="type" value="{{ old('type') }}">
<br>
  @if ($errors->has("type"))
<span class="invalid-feedback" role="alert">
    <strong>{{$errors->first("type")}}</strong>
<br>
</span>
  @endif



 <label for="">Descripcion</label>
 <br>
 <textarea name="description" rows="8" cols="21">{{ old('description') }}</textarea>
 <br>
 @if ($errors->has("description"))
<span class="invalid-feedback" role="alert">
   <strong>{{$errors->first("description")}}</strong>
<br>
</span>
 @endif
 <label for="">IBU</label>
 <br>
<input type="number" name="IBUs" value="">
<br>
@if ($errors->has("IBUs"))
<span class="invalid-feedback" role="alert">
  <strong>{{$errors->first("IBUs")}}</strong>
<br>
</span>
@endif
<label for="">Porcentaje de Alcohol</label>
<br>
<input type="number" name="alcohol_content" value="Ej:7.8">
<br>
@if ($errors->has("alcohol_content"))
<span class="invalid-feedback" role="alert">
  <strong>{{$errors->first("alcohol_content")}}</strong>
<br>
</span>
@endif
<label for="">Color</label>
<br>
<select class="" name="color_id">
  <br>
  <option value="">Elegí un color</option>
  @foreach ($colors as $color)
    <option
      value="{{$color->id}}"
      {{ old('color_id', "") == $color->id ? "selected" : null }}
    >{{$color->color}}</option>
  @endforeach
  </select>
  <br>
  <label for="">Insertá una imagen</label>
  <br>
  <input type="file" class="form-control-file" name="image" value="">
  <br>
  @if ($errors->has("image"))
  <span class="invalid-feedback" role="alert">
    <strong>{{$errors->first("image")}}</strong>
  <br>
  </span>
  @endif
<br>
<input type="submit" name="" value="Enviar">

</form>
@endsection
