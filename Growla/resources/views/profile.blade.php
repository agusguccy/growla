@extends('template')



<html>
<head>
  <title>Perfil</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="/css/profile.css">
</head>

<body>

@section('contenidoPrincipal')
  <div class="container" style="align-items: center; ">
    <div class="row">
        <div class="col-xs-12 col-sm-8 col-md-6">
            <div class="well well-sm" id="well">
                <div class="row" id="row">

                    <div class="col-sm-6 col-md-4">

                        <img src="/storage/fotos/{{ Auth::user()->avatar }}" alt="imagen de usuario" class="img-rounded img-responsive" >
                    </div>
                    <div class="col-sm-6 col-md-8">
                        <h4>{{ Auth::user()->name }} {{ Auth::user()->surname }} </h4>

                        <small>Birra fan lvl 9000 <i class="fas fa-beer"></i></small>
                      <br />
                        <p class="p">
                        </br>
                            <i class="fas fa-envelope-open"></i> {{ Auth::user()->email }}
                            <br />
                            <i class="fab fa-facebook"></i> {{ Auth::user()->name }} {{ Auth::user()->surname }}
                            <br />
                        </p>
                        <div class="btn-group">
                          <form class="" action="/user-edit/{{ Auth::user()->id}}/edit" method="get">
                            <button type="submit" class="btn btn-primary">
                                Editar</button>
                          </form>


                        <!-- <div class="btn-group">
                            <button type="button" class="btn btn-primary">
                                Editar</button> -->

                        </div>
                    </div>


                </div>
            </div>
        </div>
    </div>
</div>


</body>
</html>
<script src="/js/app.js"></script>
@endsection
