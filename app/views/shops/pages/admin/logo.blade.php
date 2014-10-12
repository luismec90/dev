@extends('shops.layouts.default')


@section('css')
{{ HTML::style('assets/libs/bootstrapvalidator/css/bootstrapValidator.min.css') }}
@stop

@section('js')
{{ HTML::script('assets/libs/bootstrapvalidator/js/bootstrapValidator.js') }}
{{ HTML::script('assets/libs/bootstrapvalidator/js/language/es_ES.js') }}
{{ HTML::script('assets/js/validation.js') }}
{{ HTML::script('assets/themes/one/js/logo.js') }}
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
                <h3 class="no-margin"> Logo</h3>
            </div>
        </div>

        <div class="row">
            <div class="col-md-10 ">
                <hr>
            </div>
        </div>

        {{ Form::open(['route'=>['logo_path',$shop->link],'class'=>'form-submit','files' => true]) }}

        <div class="row">
            <div class="col-md-12">
                <div class="row">
                    <div class="col-xs-12">
                        <div id="shop-preview" class="img-thumbnail" {{ !empty($shop->image_preview) ? "style='background-image:url({$shop->pathPreviwImage()})'":"" }}></div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-12">
                      <br>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-10">
                        <div class="form-group">
                            <div><b>Nota:</b> Se recomienda que la <imagen></imagen> tenga el mismo ancho y alto, además de una resolución minima de 300x300 pixeles </div>
                            <div class="input-group">
                                <input type="text" value="{{  !empty($shop->image_preview) ? "{$shop->image_preview}":"" }}" class="form-control" readonly="">
                                <span class="input-group-btn">
                                    <span class="btn btn-primary btn-file">
                                        Logo
                                        {{ Form::file('logo',['id'=>'logo','accept'=>'image/*','required'=>'true']) }}
                                    </span>
                                </span>
                            </div>
                        </div>
                    </div>
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

        {{ Form::close() }}

    </div>
</div>

@stop