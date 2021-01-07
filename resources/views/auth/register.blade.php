@extends('layouts.app')

@section('content')
<!-- <div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Register</div>

                <div class="panel-body">
                    <form class="form-horizontal" method="POST" action="{{ route('register') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label">Name</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required autofocus>

                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">E-Mail Address</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="email" class="col-md-4 control-label">perfil</label>
                            <div class="col-md-6">
                                <select name="perfil" class="form-control" id="perfil">
                                    @foreach($perfiles as $perfil)
                                        @if($perfil->id == 3)
                                            <option selected value="{{$perfil->id}}">{{$perfil->nombre}}</option>
                                        @else
                                            <option value="{{$perfil->id}}">{{$perfil->nombre}}</option>
                                        @endif
                                    @endforeach
                                </select>
                            </div>
                            
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="col-md-4 control-label">Password</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="password-confirm" class="col-md-4 control-label">Confirm Password</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Register
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
 -->
<!-- Adicional -->
<div class="limiter">
        <div class="container-login100">
            <div class="wrap-login100">
                <div class="login100-form-title" style="background-image: url(loginn/images/uno.jpg);">
                    <span class="login100-form-title-1">
                        Registrarse
                    </span>
                </div>

                <form class="login100-form validate-form" method="POST" action="{{ route('register') }}">
                    {{ csrf_field() }}

                    <div class="wrap-input100 validate-input m-b-26" class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                        <span class="label-input100">Nombre</span>
                        <input class="input100" id="name" type="text" name="name" value="{{old('email')}}" required autofocus placeholder="Agrege su Nombre">
                        @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                        <span class="focus-input100"></span>
                    </div>


                   

                    <div class="wrap-input100 validate-input m-b-26" class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                        <span class="label-input100">Correo</span>
                        <input class="input100" type="email" name="email" value="{{old('email')}}" required autofocus placeholder="Agrege su Correo">
                        @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                        <span class="focus-input100"></span>
                    </div>

                     <div class="wrap-input100 validate-input m-b-26" class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                        <span class="label-input100">Perfil</span>
                         <select name="perfil" class="form-control" id="perfil">
                                    @foreach($perfiles as $perfil)
                                        @if($perfil->id == 3)
                                            <option selected value="{{$perfil->id}}">{{$perfil->nombre}}</option>
                                        @else
                                            <option value="{{$perfil->id}}">{{$perfil->nombre}}</option>
                                        @endif
                                    @endforeach
                                </select>
                    </div>

                    <div class="wrap-input100 validate-input m-b-18" class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                        <span class="label-input100">Contraseña</span>
                        <input class="input100" id="password" type="password" name="password"  required placeholder="Escriba su Contraseña">
                        @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                        <span class="focus-input100"></span>
                    </div>


                    <div class="wrap-input100 validate-input m-b-18">
                        <span class="label-input100">Confirma tu contraseña</span>
                        <input class="input100" id="password-confirm" type="password" name="password_confirmation"  required placeholder="Confirme su Contraseña">
                        @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                        <span class="focus-input100"></span>
                    </div>


                    <div class="flex-sb-m w-full p-b-30">

                        <div>
                            <a href="#" class="txt1">
                               
                            </a>
                        </div>
                    </div>

                    <div class="container-login100-form-btn">
                        <button type="submit" class="login100-form-btn">
                            Entrar
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    
<!-- fin Adicional -->

@endsection
