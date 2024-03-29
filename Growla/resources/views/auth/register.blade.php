@extends('template')

@section('pageTitle', 'Registro')

@section('contenidoPrincipal')

<style media="screen">
  .padding-null {
    padding: 0px !important;
  }
  label{
    color: rgba(255, 255, 255, 0.99);
    font-size: 15px;
  }
  strong{
    color: rgba(238, 187, 6, 0.96);
  }
  form{
    background-color: rgba(74, 74, 74, 0.98);
    margin-top: 50px;
    border: 2px solid #fff;
    border-radius: 15px;
  }
  form .form-row{
    display: flex;
    flex-direction: row;
    justify-content: space-around;
  }
  .opps{
  			display: none;
  			color: red;
  		  }
</style>

<div class="container padding-null">
  <div class="row padding-null">
    <figure class="col-md-6 col-md-offset-3 padding-null">
      <img src="images/logonegropaint.png" alt="" class="img-responsive">
    </figure>
  </div>
</div>

<div class="container-fluid padding-nul">

    <div class="col-md-6 col-md-offset-3 padding-null">

                  <form  class="theForm" method="POST" action="{{ route('register') }}" enctype="multipart/form-data">
                      @csrf
                       <div class="form-row col-md-10 col-md-offset-1">
                          <div class="form-group col-md-5 padding-null text-center @error('name') has-error @enderror">
                              <label for="name" class="col-md-12 text-md-center">{{ __('Nombre') }}</label>
                                  <input id="name" placeholder="Introduzca su nombre" type="text" class="form-control" name="name" value="{{ old('name') }}" autocomplete="name" autofocus>
                                  <div class="opps">
                                    <!-- Mensaje de error -->
                                  </div>
                                  @error('name')
                                      <span class="invalid-feedback" role="alert">
                                          <strong>{{ $message }}</strong>
                                      </span>
                                  @enderror
                          </div>

                          <div class="form-group col-md-5 padding-null text-center @error('surname') has-error @enderror">
                              <label for="surname" class="col-md-12 text-md-center">{{ __('Apellido') }}</label>

                                  <input id="surname" placeholder="Introduzca su apellido" type="text" class="form-control" name="surname" value="{{ old('surname') }}"  autocomplete="surname" autofocus>
                                  <div class="opps">
                                    <!-- Mensaje de error -->
                                  </div>
                                  @error('surname')
                                      <span class="invalid-feedback" role="alert">
                                          <strong>{{ $message }}</strong>
                                      </span>
                                  @enderror
                          </div>
                        </div>

                        <div class="form-row col-md-10 col-md-offset-1">
                          <div class="form-group col-md-5 padding-null text-center @error('email') has-error @enderror">
                              <label for="email" class="col-md-12 text-md-center">{{ __('Email') }}</label>

                                  <input id="email" placeholder="Introduzca su Email" type="email" class="form-control " name="email" value="{{ old('email') }}"  autocomplete="email">
                                  <div class="opps">
                                    <!-- Mensaje de error -->
                                  </div>
                                  @error('email')
                                      <span class="invalid-feedback" role="alert">
                                          <strong>{{ $message }}</strong>
                                      </span>
                                  @enderror
                          </div>

                          <div class="form-group col-md-5 padding-null text-center @error('Re-email') has-error @enderror">
                              <label for="Re-email" class="col-md-12 text-md-center">{{ __('Confirmar Email') }}</label>

                                  <input id="Re-email" placeholder="Confirme su email" type="Re-email" class="form-control " name="Re-email" value="{{ old('Re-email') }}"  autocomplete="Re-email">
                                  <div class="opps">
                                    <!-- Mensaje de error -->
                                  </div>
                                  @error('Re-email')
                                      <span class="invalid-feedback" role="alert">
                                          <strong>{{ $message }}</strong>
                                      </span>
                                  @enderror
                          </div>
                        </div>

                        <div class="form-row col-md-10 col-md-offset-1">
                          <div class="form-group col-md-5 padding-null text-center  @error('password') has-error @enderror">
                            <label for="password" class="col-md-12 text-md-center">{{ __('Contraseña') }}</label>
                              <input id="password" placeholder="Introduzca su contraseña" type="password" class="form-control" name="password"  autocomplete="new-password">
                              <div class="opps">
                                <!-- Mensaje de error -->
                              </div>
                              @error('password')
                                  <span class="invalid-feedback" role="alert">
                                      <strong>{{ $message }}</strong>
                                  </span>
                              @enderror
                          </div>

                          <div class="form-group col-md-5 padding-null text-center">
                              <label for="password-confirm" class="col-md-12 text-md-center">{{ __('Confirma Contraseña') }}</label>
                                <input id="password-confirm" placeholder="Confirme su contraseña" type="password" class="form-control" name="password_confirmation"  autocomplete="new-password">
                          </div>

                        </div>

                        <div class="form-row col-md-10 col-md-offset-1">
                          <div class="form-group col-md-8 padding-null @error('pais') has-error @enderror text-center">
                              <label for="country" class="col-md-12 text-center">{{ __('Pais') }}</label>

                                <select id="country" class=" form-control " name="country" value="{{ old('country') }}"  autocomplete="country" autofocus>
                                </select>
                                <div class="opps">
                                  <!-- Mensaje de error -->
                                </div>
                                  @error('country')
                                      <span class="invalid-feedback" role="alert">
                                          <strong>{{ $message }}</strong>
                                      </span>
                                  @enderror
                          </div>
                        </div>

                        <div class="form-row col-md-10 col-md-offset-1 ">
                          <div class="form-group col-md-8 padding-null hidden @error('city') has-error @enderror text-center">
                              <label for="city" class="col-md-12 text-center">{{ __('Provincia') }}</label>
                                <select id="city" class=" form-control " name="city" value="{{ old('city') }}"  autocomplete="city" autofocus>
                                </select>
                                <div class="opps">
                                  <!-- Mensaje de error -->
                                </div>
                                @error('city')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                          </div>
                        </div>

                        <div class="form-row col-md-10 col-md-offset-1">
                          <div class="form-group col-md-8 padding-null @error('file') has-error @enderror text-center">
                              <label for="file" class="col-md-12 text-center">{{ __('Foto de perfil') }}</label>
                              <input id="file" type="file" class=" " name="foto" value="{{ old('file') }}"  autocomplete="file" autofocus>
                              <div class="opps">
                                <!-- Mensaje de error -->
                              </div>
                              @error('file')
                                <span class="invalid-feedback" role="alert">
                                  <strong>{{ $message }}</strong>
                                </span>
                              @enderror
                          </div>
                        </div>

                        <div class="form-group row mb-0">
                          <div class="col-md-12 text-center">
                              <button action="{{ route('login') }}" type="submit" class="btn btn-primary">
                                {{ __('Registrarse') }}
                              </button>
                          </div>
                        </div>

                  </form>

    </div>
</div>
	<script src="js/validation.js"></script>

</script>
@endsection
