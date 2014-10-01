@extends('layouts.default')

@section('css')
{{ HTML::style('assets/libs/bootstrapvalidator/css/bootstrapValidator.min.css') }}
{{ HTML::style('assets/css/registro.css') }}
@stop

@section('js')
{{ HTML::script('assets/libs/bootstrapvalidator/js/bootstrapValidator.js') }}
{{ HTML::script('assets/libs/bootstrapvalidator/js/language/es_ES.js') }}
{{ HTML::script('assets/js/validation.js') }}
@stop

@section('content')

<section class="section  section-cta">
    <div class="container">
        <h2 class="section-title"><span>Mi perfil</span></h2>
        <div class="col-sm-8 col-sm-offset-2">
            @include('layouts.partials.errors')
            <div class="panel with-nav-tabs panel-primary">
                <div class="panel-heading">
                        <ul class="nav nav-tabs">
                            <li class="active"><a>Información general</a></li>
                            <li><a href="{{ route('password_path') }}">Cambiar contraseña</a></li>
                        </ul>
                </div>
                <div class="panel-body">
                    <div class="tab-content">
                        <div class="tab-pane fade in active" >
                            {{ Form::model(Auth::user(),['route'=>'update_profile_path','class'=>'validate', 'files' => true]) }}

                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <center>@include('layouts.partials.avatar',['size'=>200])</center>
                                            <br>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-xs-12">
                                            <div class="input-group">
                                                <input type="text" class="form-control" readonly="">
                                                <span class="input-group-btn">
                                                    <span class="btn btn-primary btn-file">
                                                        Cambiar imagen
                                                        {{ Form::file('avatar',['accept'=>'image/*']) }}
                                                    </span>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>

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
                                {{ Form::text('birth_date',null,['class'=>'form-control datepickerBirthday','required'=>'required']) }}
                                </div>

                                <!-- Sexo Form Input -->
                                <div class="form-group">
                                {{ Form::label('gender','Sexo:') }}
                                {{ Form::select('gender', [''=>'Seleccionar...','f' => 'Femenino', 'm' => 'Masculino'],null,['class'=>'form-control','required'=>'required']) }}
                                </div>

                                <!-- Email Form Input -->
                                <div class="form-group">
                                {{ Form::label('email','E-mail:') }}
                                {{ Form::email('email',null,['class'=>'form-control','readonly'=>'true']) }}
                                </div>


                                <div class="form-group">
                                <div class="row">
                                    <div class="col-md-3 col-sm-3 col-xs-12">
                                        {{ Form::submit('Enviar',['class'=>'btn btn-primary btn-block']) }}
                                    </div>
                                </div>
                                </div>

                            {{ Form::close() }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@stop