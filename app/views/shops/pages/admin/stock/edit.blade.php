@extends('shops.layouts.default')


@section('css')
{{ HTML::style('assets/libs/bootstrapvalidator/css/bootstrapValidator.min.css') }}
@stop

@section('js')
{{ HTML::script('assets/libs/bootstrapvalidator/js/bootstrapValidator.js') }}
{{ HTML::script('assets/libs/bootstrapvalidator/js/language/es_ES.js') }}
{{ HTML::script('assets/js/validation.js') }}
{{ HTML::script('assets/themes/one/js/stock.js') }}
@stop

@section('content')


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
                <a href="{{ URL::route('stock_path',$shop->link) }}" class="btn btn-primary" title=""><i class="fa fa-reply"></i> Volver atrás</a>
            </div>
        </div>

        <div class="row">
            <div class="col-xs-10">
                <br>
            </div>
        </div>

        <div class="row">
            <div class="col-md-10">
                <button class="btn btn-danger pull-right" data-toggle="modal" data-target="#modal-eliminar-stock">
                    Eliminar cover
                </button>
                <h3 class="no-margin"> Crear item</h3>
            </div>
        </div>


        {{ Form::model($stock,['route'=>['update_stock_path',$shop->link,$stock->id],'class'=>'validate']) }}
            @include('shops.layouts.partials.create_edit_stock')
        {{ Form::close() }}

    </div>

</div>

<!-- Modal -->
<div class="modal fade" id="modal-eliminar-stock" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        {{ Form::open(['route'=>['destroy_stock_path',$shop->link,$stock->id],'method'=>'DELETE']) }}
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                    <h4 class="modal-title" id="myModalLabel">Eliminar item</h4>
                </div>
                <div class="modal-body">
                    ¿Está seguro de eliminar permanentemente este item?
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