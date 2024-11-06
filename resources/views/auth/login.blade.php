@extends('layouts.version2.modulos2')

@section('contenido')
<br>
<br>
<br>
<div class="container">
    <div class="container-fluid">
        <div class="text-center">
            <center><h2 style="color: #152F4A; font-weight: 600;">DIVISIÓN ESPECIALIZADA EN INVESTIGACIÓN Y DENUNCIAS</h2></center>
        </div>
            <div class="row justify-content-center">
                <div class="col-sm-4 contenedor-login">
                    <div class="login-card card-block auth-body">
                        <form method="POST" action="{{ route('login') }}">
                        @csrf
                        <div class="auth-box" style="background-image: url('{{ asset('img/fondo_login_pvn.png') }}'); background-repeat: no-repeat; background-size: cover;">
                            <div class="text-center">
                                <img src="{{ asset('/img/Denuncia_policia/logo_loging.png') }}" alt="logo">
                             </div>
                             <br>
                             <br>
                                <div class="input-group col-md-12">
                                    <input type="text" id="email" type="text" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}"  autofocus placeholder="Usuario">
                                        @if ($errors->has('email'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('email') }}</strong>
                                            </span>
                                        @endif
                                </div>
                                    <br>
                                    
                                <div class="input-group col-md-12">
                                        <input type="password" id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password"  placeholder="Contraseña">
                                            @if ($errors->has('password'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('password') }}</strong>
                                                </span>
                                            @endif
                                </div>
                                    <br>


                                <div class="m-t-30">
                                    <div class="col-md-12">
                                            <button type="submit" class="btn btn-primary btn-md btn-block waves-effect text-center m-b-20" style="background-color: #152F4A; font-size: 18px !important;"onMouseOver="this.style.cssText='background-color: #1C426A'" onMouseOut="this.style.cssText='background-color: #152F4A'">I n g r e s a r</button>
                                    </div>
                                </div>   
                                <br>
                                <br>
 
                                <div class="row m-t-30" style="margin-right: 0px; margin-left: -4px;">
                                    <div class="col-lg-5 col-md-5 col-sm-5 col-5" style="background-color: #C6C6C6; height: 20px; border-bottom-left-radius: 25px;"></div>
                                    <div class="col-lg-3 col-md-3 col-sm-3 col-3" style="background-color: #C09F77; height: 20px;"></div>
                                    <div class="col-lg-4 col-md-4 col-sm-4 col-4" style="background-color: #152F4A; height: 20px; border-bottom-right-radius: 25px;"></div>
                                  </div>
  
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
