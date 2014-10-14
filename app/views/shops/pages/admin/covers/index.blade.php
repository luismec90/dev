@extends('shops.layouts.default')


@section('css')
{{ HTML::style('assets/libs/bootstrapvalidator/css/bootstrapValidator.min.css') }}
@stop

@section('js')
{{ HTML::script('assets/libs/bootstrapvalidator/js/bootstrapValidator.js') }}
{{ HTML::script('assets/libs/bootstrapvalidator/js/language/es_ES.js') }}
{{ HTML::script('assets/js/validation.js') }}
{{ HTML::script('assets/themes/one/js/product.js') }}
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
            <div class="col-md-12">
                @include('layouts.partials.errors')
            </div>
        </div>

        <div class="row">
            <div class="col-xs-12">
                <br>
            </div>
        </div>

        <div class="row">
            <div class="col-xs-12">
                        <a href="{{ route('admin_create_cover_path',$shop->link) }}" class="btn btn-primary pull-right">
                            Crear cover
                        </a>
                <h3 class="no-margin"> Covers</h3>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12 ">
                <hr>
            </div>
        </div>

        <div class="row">
            <div class="col-xs-12">
                <table class="table table-hover table-striped table-bordered">
                    <thead>
                        <tr>
                            <td>Cover</td>
                            <td>Texto</td>
                            <td>Opciones</td>
                        </tr>
                    </thead>
                    @foreach($shop->covers as $cover)
                    <tr>
                        <td class="col-xs-8"> <img  src="{{ $cover->pathImage($shop->id) }}" alt="..."></td>
                         <td class="col-xs-2">{{ $cover->caption }}</td>
                         <td class="col-xs-2">
                         <a href="{{ route('admin_edit_cover_path',[$shop->link,$cover->id]) }}" class="btn btn-primary btn-sm">Editar cover</a>
                        </td>
                    </tr>
                    @endforeach
                </table>
            </div>
        </div>
    </div>
</div>

@stop