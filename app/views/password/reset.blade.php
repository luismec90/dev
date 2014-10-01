@extends('layouts.default')

@section('css')
{{ HTML::style('assets/libs/bootstrapvalidator/css/bootstrapValidator.min.css') }}
@stop

@section('js')
{{ HTML::script('assets/libs/bootstrapvalidator/js/bootstrapValidator.js') }}
{{ HTML::script('assets/libs/bootstrapvalidator/js/language/es_ES.js') }}
{{ HTML::script('assets/js/validation.js') }}
@stop

@section('content')
<section class="section  section-cta">
    <div class="container">
    <h2 class="section-title"><span>Restablecer contraseña</span></h2>
        <div class="col-xs-12 col-sm-8 col-md-6 col-sm-offset-2 col-md-offset-3">

        @include('layouts.partials.errors')

        {{ Form::open(['class'=>'validate']) }}

            {{ Form::hidden('token',$token) }}

            <!-- Email Form Input -->
            <div class="form-group">
                {{ Form::label('email','Email:') }}
                {{ Form::email('email',null,['class'=>'form-control','required ']) }}
            </div>

            <!-- Nueva contraseña Form Input -->
            <div class="form-group">
                {{ Form::label('password','Nueva contraseña:') }}
                {{ Form::password('password',['class'=>'form-control','required ']) }}
            </div>

            <!-- Confirmar contraseña Form Input -->
            <div class="form-group">
                {{ Form::label('password_confirmation','Confirmar contraseña:') }}
                {{ Form::password('password_confirmation',['class'=>'form-control','required ']) }}
            </div>

            <!-- Enviar contraseña button -->
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