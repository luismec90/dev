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
        <h2 class="section-title"><span>Completar registro</span></h2>
        <div class="col-sm-6 col-sm-offset-3">

            @include('layouts.partials.errors')

            {{ Form::model($user,['route'=>['complete_registration',$shop,$user->email,$token],'class'=>'validate']) }}
            {{ Form::hidden('token',$token) }}
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
            {{ Form::email('email',null,['class'=>'form-control','required'=>'required','readonly'=>'true']) }}
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
                    {{ Form::submit('Enviar',['class'=>'btn btn-primary btn-block']) }}
                </div>
            </div>
            </div>

            {{ Form::close() }}
        </div>
    </div>
</section>

@stop