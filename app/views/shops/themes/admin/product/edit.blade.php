@extends('.........layouts.default')


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
    <div class="col-xs-12">
        <h1 class="page-header">
            <a href="{{ URL::route('admin_show_category_path',[$shop->name,$category->name]) }}" class="btn btn-success" title=""><i class="fa fa-reply"></i></a>  
            Producto: <em class="text-info">{{ $product->name }}</em>
            <!-- Button trigger modal -->
            <button class="btn btn-danger pull-right" data-toggle="modal" data-target="#modal-eliminar-producto">
              Eliminar producto
            </button>
        </h1>
    </div>
</div>
<div class="row">
    <div class="col-xs-12 col-sm-8 col-md-6 col-sm-offset-2 col-md-offset-3">
        {{ Form::model($product,['route'=>['admin_update_product_path',$shop->name,$category->name,$product->name],'class'=>'validate']) }}

        <!-- Nombre Form Input -->
        <div class="form-group">
            {{ Form::label('name','Nombre:') }}
            {{ Form::text('name',null,['class'=>'form-control','required'=>'required']) }}
        </div>

        <div class="form-group">
            {{ Form::submit('Enviar',['class'=>'btn btn-success']) }}
        </div>

        {{ Form::close() }}
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="modal-eliminar-producto" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        {{ Form::open(['route'=>'admin_destroy_category_path']) }}
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <h4 class="modal-title" id="myModalLabel">Eliminar producto</h4>
            </div>
            <div class="modal-body">

                {{ Form::hidden('name',$product->id,['required'=>'required']) }}

                Esta seguro de eliminar permanentemente este producto?



            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                {{ Form::submit('Enviar',['class'=>'btn btn-success']) }}
            </div>
        </div>
        {{ Form::close() }}
    </div>
</div>

@stop