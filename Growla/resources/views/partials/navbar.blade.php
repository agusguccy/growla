@if (session('adminError'))
	<div class="alert alert-danger">
		{{ session('adminError') }}
	</div>
@endif
<nav class="navbar navbar-inverse">
      <div class="container-fluid">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <img src="\images\Growla_logo_circulo_fondoblanco.png" alt="logo" class="navbar-brand">
        </div>
        <div class="collapse navbar-collapse" id="myNavbar">
          @if (Route::has('login'))
                                @auth
                 <ul class="nav navbar-nav">
                   <li><a href="/home "> Home </a></li>
                   <li><a href="/beers-list "> Birras </a></li>
                   @auth
                   			@if (Auth::user()->isAdmin())
                   <li><a href="/new-beer "> Agregar Cerveza </a></li>
                   	    @endif
                   @endauth


                   <li><a href="/faq "> FAQs </a></li>

                 </ul>
          @else
          <ul class="nav navbar-nav">
            <li><a href="/home "> Home </a></li>
            <li><a href="/beers-list "> Birras </a></li>
            <li><a href="/faq "> FAQs </a></li>
            <li><a href="/login "> Ingresá </a></li>
            @if (Route::has('register'))
                                        <li><a href="/register "> Register </a></li>

                                    @endif
          </ul>
@endauth

        <div class="pull-right">
                <ul class="nav pull-right">
                  <div class="search">
                   <form action="{{ URL::to('/search-results') }}" method="POST" role="search">
                    {{ csrf_field() }}

                        <input type="text" class="form-control" name="searchBar"	placeholder="Buscar">
                   </form>
                  </div>
                    @auth
                    <li  class="dropdown"><a href="/profile" class="dropdown-toggle" data-toggle="dropdown" id="perfil">Perfil<b class="caret"></b></a>
                        <ul style="left: -100%;" class="dropdown-menu">

                            <li><a href="/profile"><i class="icon-cog" ></i>Ver mi perfil</a></li>
                            <li><a href="/faq"><i class="icon-envelope" id="help"></i>Ayuda</a></li>
                            <li class="divider"></li>
                            <li>
                              <form action="/logout" method="post">
                                @csrf
                                <button class="icon-off" type="submit" name="button">Cerrar Sesión</button>
                              </form>
                            </li>
                        </ul>
                    </li>
                    @endauth
                </ul>
          </div>
        @endif
        </div>
          </div>
        </nav>
<br>
<script src="/js/app.js"></script>
