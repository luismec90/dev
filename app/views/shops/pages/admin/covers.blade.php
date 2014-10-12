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
            <div class="col-md-10">
                @include('layouts.partials.errors')
            </div>
        </div>

        <div class="row">
            <div class="col-xs-10">
                <br>
            </div>
        </div>

        <div class="row">
            <div class="col-xs-10">
                <h3 class="no-margin"> Covers</h3>
            </div>
        </div>

        <div class="row">
            <div class="col-md-10 ">
                <hr>
            </div>
        </div>




    </div>
</div>

@stop