@extends('layouts.master')

@section('content')

<div class="row" style="margin-top:20px">

    <div class="col-md-offset-3 col-md-6">

        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title text-center">
                    <span class="glyphicon glyphicon-user" aria-hidden="true"></span>
                    Identificación de usuario
                </h3>
            </div>

            <div class="panel-body" style="padding:30px">
            
                {{-- TODO: Abrir el formulario por POST y con la acción /auth/login --}}
                
                    {{-- TODO: Protección contra CSRF --}}
    
                    <div class="form-group">
                        {{-- TODO: Incluir una etiqueta tipo 'label' para el campo 'email' y con el texto 'Email:' --}}

                        <input type="email" name="email" id="email" value="{{ old('email') }}" class="form-control">
                    </div>

                    <div class="form-group">
                        {{-- TODO: Incluir una etiqueta tipo 'label' para el campo 'password' y con el texto 'Contraseña:' --}}

                        <input type="password" name="password" id="password" class="form-control">
                    </div>
                    
					<div class="form-group">
                        <label for="remember">
                            <input type="checkbox" name="remember" id="remember"> 
                            Recuérdame
                        </label>
                    </div>

                    <div class="form-group text-center">
                        <button type="submit" class="btn btn-primary" style="padding:8px 100px;margin-top:25px">
                            Entrar
                        </button>
                    </div>

                {{-- TODO: Cerrar el formulario --}}

            </div>
        </div>
    </div>
</div>

@stop
