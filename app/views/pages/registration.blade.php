@extends('layouts.default')
@section('css')
{{ HTML::style('assets/css/registro.css') }}
@stop
@section('js')
{{ HTML::script('assets/js/registration.js') }}
@stop
@section('content')
<section class="section  section-cta">
    <div class="container">
        <h1 class="section-title"><span>Registro</span></h1>
        <div class="row">
            <div class="col-xs-12">
                @include('layouts.partials.errors')
            </div>
        </div>
        <div class="row">
            <div class="col-xs-12">
                <div class="col-sm-6">
                    <div id="global-authorization" class="row">
                        <div class="social-login col-xs-12">
                            <a href="{{ route('login_facebook_path') }}" class="facebook">
                                <i class="fa fa-facebook"></i>
                                <div>Registrarse usando Facebook</div>
                            </a>
                            <a href="{{ route('login_google_path') }}" class="google">
                                <i class="fa fa-google-plus"></i>
                                <div>Registrarse usando Google</div>
                            </a>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-12">
                            <hr>
                        </div>
                    </div>
                    {{ Form::open(['route'=>'register_path','class'=>'validate','id'=>'form-registration']) }}
                    <!-- Nombres Form Input -->
                    <div class="form-group">
                        {{ Form::label('first_name','Nombres:') }}
                        {{ Form::text('first_name',null,['class'=>'form-control','required'=>'required']) }}
                    </div>
                    <!-- Apellidos Form Input -->
                    <div class="form-group">
                        {{ Form::label('last_name','Apellidos:') }}
                        {{ Form::text('last_name',null,['class'=>'form-control','required'=>'required']) }}
                    </div>
                    <!-- Fecha de nacimiento Form Input -->
                    <div class="form-group">
                        {{ Form::label('birth_date','Fecha de nacimiento:') }}
                        {{ Form::text('birth_date',null,['class'=>'form-control datepickerBirthday']) }}
                    </div>
                    <!-- Genero Form Input -->
                    <div class="form-group">
                        {{ Form::label('gender','Género:') }}
                        {{ Form::select('gender', [''=>'Seleccionar...','f' => 'Femenino', 'm' => 'Masculino'],null,['class'=>'form-control','required'=>'required']) }}
                    </div>
                    <!-- Email Form Input -->
                    <div class="form-group">
                        {{ Form::label('email','E-mail:') }}
                        {{ Form::email('email',null,['class'=>'form-control','required'=>'required']) }}
                    </div>
                    <!-- Contraseña Form Input -->
                    <div class="form-group">
                        {{ Form::label('password','Establecer una contraseña:') }}
                        {{ Form::password('password',['class'=>'form-control','required'=>'required']) }}
                    </div>
                    <!-- Repetir contraseña Form Input -->
                    <div class="form-group">
                        {{ Form::label('password_confirmation','Confirmar contraseña:') }}
                        {{ Form::password('password_confirmation',['class'=>'form-control','required'=>'required']) }}
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-3 col-sm-3 col-xs-12">
                                {{ Form::button('Enviar',['id'=>'btn-form-registration','class'=>'btn btn-primary btn-block']) }}
                            </div>
                        </div>
                    </div>
                    {{ Form::close() }}
                </div>
                <div class="col-sm-6">
                    @include('layouts/partials/support')
                </div>
            </div>
        </div>
    </div>
</section>
@stop