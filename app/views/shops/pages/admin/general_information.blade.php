@extends('shops.layouts.default')

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

<div class="row">
    @include('shops.layouts.partials.left_menu')

    <div class="col-md-9">

        <div class="row">
            <div class="col-xs-12">
                <h3 class="no-margin">Información general</h3>
            </div>
        </div>

        <div class="row">
            <div class="col-xs-12">
                <hr>
            </div>
        </div>

        <div class="row">
            <div class="col-xs-12">
            </div>
        </div>
        <div class="row">
            <div class="col-xs-12">
                 @include('layouts.partials.errors')

                {{ Form::model($shop,['route'=>['update_general_information_path',$shop->link],'class'=>'validate']) }}

                <div class="row">
                    <div class="col-sm-6">
                        <!-- Name Form Input -->
                        <div class="form-group">
                            {{ Form::label('name','Nombre:') }}
                            {{ Form::text('name',null,['class'=>'form-control','required'=>'required']) }}
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <!-- Link Form Input -->
                        <div class="form-group">
                        {{ Form::label('link','Link:') }}
                        {{ Form::text('link',null,['class'=>'form-control','required'=>'required','readonly'=>'true']) }}
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-6">
                        <!-- Lat Form Input -->
                        <div class="form-group">
                            {{ Form::label('lat','Latitud:') }}
                            {{ Form::text('lat',null,['class'=>'form-control','required'=>'required','readonly'=>'true']) }}
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <!-- Lng Form Input -->
                        <div class="form-group">
                        {{ Form::label('lng','Longitud:') }}
                        {{ Form::text('lng',null,['class'=>'form-control','required'=>'required','readonly'=>'true']) }}
                        </div>
                    </div>
                </div>


                <div class="row">
                    <div class="col-sm-6">
                        <!-- Retribution Form Input -->
                        <div class="form-group">
                        {{ Form::label('retribution','Retribución') }}
                         <div class="input-group">
                               {{ Form::number('retribution',null,['class'=>'form-control','required'=>'required']) }}
                               <div class="input-group-addon">%</div>
                        </div>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <!-- balance_deadline Form Input -->
                        <div class="form-group">
                            {{ Form::label('balance_deadline','Días de vigencia del saldo:') }}
                            {{ Form::number('balance_deadline',null,['class'=>'form-control','required'=>'true']) }}
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-6">
                        <!-- Email Form Input -->
                        <div class="form-group">
                            {{ Form::label('email','E-mail:') }}
                            {{ Form::email('email',null,['class'=>'form-control']) }}
                        </div>
                    </div>

                    <div class="col-sm-6">
                        <!-- Phone Form Input -->
                        <div class="form-group">
                        {{ Form::label('phone','Télefono') }}
                        {{ Form::text('phone',null,['class'=>'form-control']) }}
                        </div>
                    </div>

                </div>
                <div class="row">
                    <div class="col-sm-6">
                                            <!-- Cell Form Input -->
                                            <div class="form-group">
                                            {{ Form::label('cell','Celular') }}
                                            {{ Form::text('cell',null,['class'=>'form-control']) }}
                                            </div>
                                        </div>
                </div>

                <!-- Street Address Form Input -->
                <div class="form-group">
                    {{ Form::label('street_address','Dirección:') }}
                    {{ Form::text('street_address',null,['class'=>'form-control']) }}
                </div>

                <!-- Schedule Form Input -->
                <div class="form-group">
                    {{ Form::label('schedule','Horario:') }}
                    {{ Form::text('schedule',null,['class'=>'form-control']) }}
                </div>

                <!-- About Form Input -->
                <div class="form-group">
                    {{ Form::label('about','Acerca:') }}
                    {{ Form::textarea('about',null,['class'=>'form-control','rows'=>5]) }}
                </div>

                <!-- Facebook Form Input -->
                <div class="form-group">
                    {{ Form::label('facebook','Facebook:') }}
                    {{ Form::text('facebook',null,['class'=>'form-control']) }}
                </div>

                <div class="row">
                    <div class="col-sm-6">


                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    {{ Form::submit('Enviar',['class'=>'btn btn-primary btn-block']) }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                {{ Form::close() }}
            </div>
        </div>
    </div>
</div>
<br>
@stop