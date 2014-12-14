@extends('shops.layouts.default')


@section('css')
{{ HTML::style('assets/libs/bootstrapvalidator/css/bootstrapValidator.min.css') }}
@stop

@section('js')
{{ HTML::script('assets/libs/bootstrapvalidator/js/bootstrapValidator.js') }}
{{ HTML::script('assets/libs/bootstrapvalidator/js/language/es_ES.js') }}
{{ HTML::script('assets/js/validation.js') }}
{{ HTML::script('assets/themes/one/js/cover.js') }}
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
                <a href="{{ URL::route('covers_path',$shop->link) }}" class="btn btn-primary" title=""><i class="fa fa-reply"></i> Volver atrás</a>
            </div>
        </div>

        <div class="row">
            <div class="col-xs-10">
                <br>
            </div>
        </div>

        <div class="row">
            <div class="col-xs-12">
                <button class="btn btn-danger pull-right" data-toggle="modal" data-target="#modal-eliminar-cover">
                    Eliminar cover
                </button>
                <h3 class="no-margin"> Editar cover</h3>
            </div>
        </div>

        {{ Form::model($cover,['route'=>['admin_update_cover_path',$shop->link,$cover->id],'class'=>'validate','files' => true]) }}
             @include('shops.layouts.partials.create_edit_cover')
        {{ Form::close() }}
    </div>

</div>

<!-- Modal -->
<div class="modal fade" id="modal-eliminar-cover" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        {{ Form::open(['route'=>['admin_destroy_cover_path',$shop->link,$cover->id],'method'=>'DELETE']) }}
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                    <h4 class="modal-title" id="myModalLabel">Eliminar cover</h4>
                </div>
                <div class="modal-body">
                    ¿Está seguro de eliminar permanentemente este cover?
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