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
    <h2 class="section-title"><span>Entrar</span></h2>
        <div class="col-sm-6">

            @include('layouts.partials.errors')

            {{ Form::open(['route'=>'login_path','class'=>'validate']) }}


            <!-- Email Form Input -->
            <div class="form-group">
            {{ Form::label('email','E-mail:') }}
            {{ Form::email('email',null,['class'=>'form-control','required'=>'required']) }}
            </div>

            <!-- Contraseña Form Input -->
            <div class="form-group">
            {{ Form::label('password','Contraseña:') }}
            {{ Form::password('password',['class'=>'form-control','required'=>'required']) }}
            </div>

            <!-- Remember -->
            <div class="checkbox">
            <label>
                {{ Form::checkbox('remember', '1'); }} Recordar mi cuenta
            </label>
            </div>

            <div class="form-group">
                {{ link_to('/password/remind','¿Olvidó su contraseña?') }}
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
        <div id="global-authorization" class="col-sm-6">
            <div class="social-login">
                <a href="{{ route('login_facebook_path') }}" class="facebook"><i class="fa fa-facebook"></i><div>Entrar usando Facebook</div></a>
                <a href="{{ route('login_google_path') }}" class="google"><i class="fa fa-google-plus"></i><div>Entrar usando Google</div></a>
            </div>
        </div>
    </div>
</section>

@stop