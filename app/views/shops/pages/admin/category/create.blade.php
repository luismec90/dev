@extends('shops.layouts.default')


@section('css')
{{ HTML::style('assets/libs/bootstrapvalidator/css/bootstrapValidator.min.css') }}
@stop

@section('js')
{{ HTML::script('assets/libs/bootstrapvalidator/js/bootstrapValidator.js') }}
{{ HTML::script('assets/libs/bootstrapvalidator/js/language/es_ES.js') }}
{{ HTML::script('assets/js/validation.js') }}
@stop

@section('content')

<div class="row">
    <div class="col-lg-12">
        <h2 class="shop-title section-title"><span>{{ $shop->name }}</span></h2>
        <br>
    </div>
</div>

<div class="row">

    @include('shops.layouts.partials.left_menu')

    <div class="col-md-9">

    <div class="row">
        <div class="col-md-10">
            @include('layouts.partials.errors')
        </div>
    </div>

    <div class="row">
        <div class="col-xs-10">
            <a href="{{ URL::route('admin_category_path',$shop->link) }}" class="btn btn-primary" title=""><i class="fa fa-reply"></i> Volver atras</a>
        </div>
    </div>

    <div class="row">
        <div class="col-xs-10">
            <br>
        </div>
    </div>

    <div class="row">
        <div class="col-xs-12">
            <h3 class="no-margin"> Crear categoría</h3>
        </div>
    </div>

    {{ Form::open(['route'=>['admin_create_category_path',$shop->link],'class'=>'validate']) }}
        <div class="row">
            <div class="col-md-10 ">
                <hr>
            </div>
        </div>

        <div class="row">
            <div class="col-md-10">
                <!-- Nombre Form Input -->
                <div class="form-group">
                    {{ Form::label('name','Nombre:') }}
                    {{ Form::text('name',null,['class'=>'form-control','required'=>'required']) }}
                 </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-10 ">
                <div class="form-group">
                    <div class="row">
                        <div class="col-md-3 col-sm-3 col-xs-12">
                            {{ Form::submit('Enviar',['class'=>'btn btn-primary btn-block']) }}
                        </div>
                    </div>
                </div>
            </div>
        </div>

        </div>
    </div>
    {{ Form::close() }}
</div>



@stop