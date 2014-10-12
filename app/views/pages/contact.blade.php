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
        <p class="text-center"> Deja tu mensaje y te contactaremos a la brevedad.</p>
        <div class="main-action">

            @include('layouts.partials.errors')

           {{ Form::open(['route'=>'contact_path','class'=>'validate']) }}
                <div class="row">

                    <div class="col-sm-6">
                        <!-- Subject Form Input -->
                        <div class="form-group">
                            {{ Form::label('message','Asunto:') }}
                            {{ Form::text('subject',null,['class'=>'form-control','required'=>'required']) }}
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
                            {{ Form::label('message','Mensaje:') }}
                            {{ Form::textarea('message',null,['class'=>'form-control','rows'=>'11','required'=>'required']) }}
                        </div>

                     </div>
                </div>
             {{ Form::close() }}
        </div>
    </div>
</section>

@stop