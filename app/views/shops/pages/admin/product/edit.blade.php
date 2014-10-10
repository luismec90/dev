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
            <a href="{{ URL::route('admin_products_path',[$shop->link,$category->id]) }}" class="btn btn-primary" title=""><i class="fa fa-reply"></i> Volver atras</a>
        </div>
    </div>

    <div class="row">
        <div class="col-xs-10">
            <br>
        </div>
    </div>

     <div class="row">
        <div class="col-xs-10">
            <button class="btn btn-danger pull-right" data-toggle="modal" data-target="#modal-eliminar-producto">
                Eliminar producto
            </button>
            <h3 class="no-margin"> Editar producto: {{ $product->name }}</h3>
        </div>
    </div>

    {{ Form::model($product,['route'=>['admin_update_product_path',$shop->link,$category->id,$product->id],'class'=>'validate']) }}
        @include('shops.layouts.partials.create_edit_product')
    {{ Form::close() }}
</div>
<!-- Modal -->
<div class="modal fade" id="modal-eliminar-producto" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        {{ Form::open(['route'=>['admin_destroy_product_path',$shop->link,$category->id,$product->id],'method'=>'DELETE']) }}
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                    <h4 class="modal-title" id="myModalLabel">Eliminar producto</h4>
                </div>
                <div class="modal-body">
                    {{ Form::hidden('name',$product->id,['required'=>'required']) }}
                    ¿Está seguro de eliminar permanentemente este producto?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                    {{ Form::submit('Enviar',['class'=>'btn btn-primary']) }}
                </div>
            </div>
        {{ Form::close() }}
    </div>
</div>



@stop