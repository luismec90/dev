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
<section id="contact" class="section  section-contact">
    <div class="container">
        <h2 class="section-title"><span>Contacto</span></h2>
        <p class="text-center"> Si tienes un establecimiento comercial y deseas hacer parte de nuestra red de tiendas, o tan solo deseas mas información, por favor completa el siguiente formulario.</p>
        <div class="main-action">

            @include('layouts.partials.errors')

           {{ Form::open(['route'=>'contact_pioner_path','class'=>'validate']) }}
                <div class="row">

                    <div class="col-sm-6">
                        <!-- Subject Form Input -->
                        <div class="form-group">
                            {{ Form::label('message','Asunto:') }}
                            {{ Form::text('subject','Yo también quiero ser pionero',['class'=>'form-control','required'=>'required']) }}
                        </div>

                        <!-- Name Form Input -->
                        <div class="form-group">
                            {{ Form::label('message','Nombre:') }}
                            {{ Form::text('name',null,['class'=>'form-control','required'=>'required']) }}
                        </div>

                        <!-- Email Form Input -->
                        <div class="form-group">
                            {{ Form::label('email','Email:') }}
                            {{ Form::email('email',null,['class'=>'form-control','required'=>'required']) }}
                        </div>

                        <!-- Email Form Input -->
                            <div class="form-group">
                                {{ Form::label('phone','Celular:') }}
                                {{ Form::text('phone',null,['class'=>'form-control']) }}
                            </div>

                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-3 col-sm-3 col-xs-12">
                                    {{ Form::submit('Enviar',['class'=>'btn btn-primary btn-block']) }}
                                </div>
                            </div>
                        </div>
                    </div>
                     <div class="col-sm-6">
                        <!-- Message Form Input -->
                        <div class="form-group">
                            {{ Form::label('message','Notas adicionales:') }}
                            {{ Form::textarea('message',null,['class'=>'form-control','rows'=>'11']) }}
                        </div>

                     </div>
                </div>
             {{ Form::close() }}
        </div>
    </div>
</section>

@stop