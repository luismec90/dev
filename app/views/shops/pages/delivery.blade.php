@extends('shops.layouts.default')


@section('css')
{{ HTML::style('assets/libs/bootstrapvalidator/css/bootstrapValidator.min.css') }}
{{ HTML::style('assets/css/registro.css') }}
@stop

@section('js')
{{ HTML::script('assets/libs/bootstrapvalidator/js/bootstrapValidator.js') }}
{{ HTML::script('assets/libs/bootstrapvalidator/js/language/es_ES.js') }}
{{ HTML::script('assets/js/validation.js') }}
{{ HTML::script('assets/themes/one/js/delivery.js')}}
<script>

    var item='<div class="row item"> <div class="col-md-10"> <div class="well well-sm"> <div class="row"> <div class="col-sm-3"> <div class="form-group"> {{ Form::label("category","Categoria:") }} {{ Form::select("category",$selectCategories,null,["class"=>"form-control categoria","required"=>"true"]) }} </div> </div> <div class="col-sm-4"> <div class="form-group"> {{ Form::label("product","Producto:") }} {{ Form::select("products[]",[""=>""],null,["class"=>"form-control producto","required"=>"true","readonly"=>"true"]) }} </div> </div> <div class="col-sm-2"> <div class="form-group"> {{ Form::label("amounts","Cantidad:") }} {{ Form::number("amounts[]",1,["class"=>"form-control cantidad","required"=>"true"]) }} </div> </div> <div class="col-sm-3"> <div class="form-group"> {{ Form::label("cost","Costo:") }} <div class="input-group"> <div class="input-group-addon">$</div> {{ Form::text("costs[]",null,["class"=>"form-control costo","readonly"=>"true"]) }} </div> </div> </div> </div> </div> </div> <div class="col-md-2"> <a class="btn btn-danger remove"> <i class="fa fa-minus"></i> </a> </div> </div>';

    var retribution="{{ $shop->retribution }}";

    @foreach($shop->categories as $category)
        var category_{{ $category->id }}="<option value=''>Seleccionar...</option>";
        @foreach($category->products as $product)
            @if($product->delivery_service)
                category_{{ $category->id }}+="<option value='{{ $product->id }}' data-price='{{ $product->price }}'>{{ $product->name }}</option>";
            @endif
        @endforeach
    @endforeach

     var selectedProductId=null;
     var selectedProductCategoryId=null;
    @if(!is_null($selectedProduct))
        selectedProductId="{{ $selectedProduct->id }}";
        selectedProductCategoryId="{{ $selectedProduct->category_id }}";
    @endif
</script>
@stop

@section('content')
@include('shops.layouts.partials.title_page',['showTour'=>true])
<div class="row">
    @include('shops.layouts.partials.left_menu')

    <div class="col-md-9">

        <div class="row">
            <div class="col-xs-10">
                <h3 class="no-margin">Domicilios</h3>
            </div>
        </div>

        <div class="row">
            <div class="col-xs-10">
                <hr>
            </div>
        </div>

        <div class="row">
             <div class="col-md-10">
                @include('layouts.partials.errors')
            </div>
        </div>

        {{ Form::open(['route'=>['delivery_path',$shop->link],'class'=>'validate']) }}

        <div class="row">
            <div class="col-md-10 ">
                <div class="form-group">
                    {{ Form::label('category','Comprador:') }}
                    <input tyoe="text" disabled="true" class="form-control" value="{{ Auth::user()->first_name." ". Auth::user()->last_name }}">
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-10 ">
                <!-- Email Form Input -->
                <div class="form-group">
                    {{ Form::label('category','Email:') }}
                    <input type="email" disabled="true" class="form-control" value="{{ Auth::user()->email }}">
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-10 ">
                <!-- Phone Form Input -->
                <div class="form-group">
                    {{ Form::label('category','Télefono:') }}
                    {{ Form::text('phone',null,['class'=>'form-control','required'=>'true']) }}
                </div>
            </div>
        </div>

        <div id="products">
        <div class="row item">
        <div class="col-md-10">
        <div id="first-delivery" class="well well-sm">
            <div class="row">
                <div class="col-sm-3">

                    <div class="form-group">
                    {{ Form::label('category','Categoria:') }}
                    {{ Form::select('category',$selectCategories,null,['class'=>'form-control categoria','required'=>'true']) }}
                    </div>
                </div>
                <div class="col-sm-4">

                    <div class="form-group">
                    {{ Form::label('product','Producto:') }}
                    {{ Form::select('products[]',[''=>''],null,['class'=>'form-control producto','required'=>'true','readonly'=>'true']) }}
                    </div>
                </div>
                <div class="col-sm-2">

                    <div class="form-group">
                    {{ Form::label('product','Cantidad:') }}
                    {{ Form::number('amounts[]',1,['class'=>'form-control cantidad','required'=>'true']) }}
                    </div>
                </div>
                <div class="col-sm-3">

                    <div class="form-group">
                    {{ Form::label('cost','Costo:') }}
                    <div class="input-group">
                        <div class="input-group-addon">$</div>
                        {{ Form::text('costs[]',null,['class'=>'form-control costo','readonly'=>'true']) }}
                    </div>
                    </div>
                </div>
            </div>
        </div>
        </div>
        <div class="col-md-2">
        <a class="btn btn-info add">
            <i class="fa fa-plus"></i>
        </a>
        </div>
        </div>
        </div>

        <div class="row">
            <div class="col-md-3 col-md-offset-4">
                <!-- Total Form Input -->
                <div class="form-group {{ ($shop->retribution==0) ? "hide":"" }}">
                    {{ Form::label('category','Saldo ganado:') }}
                    <div class="input-group">
                        <div class="input-group-addon">$</div>
                        {{ Form::text('retribution',0,['id'=>'retribution','class'=>'form-control','readonly'=>'true']) }}
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                 <!-- Total Form Input -->
                <div class="form-group">
                    {{ Form::label('category','Total a pagar:') }}
                    <div class="input-group">
                        <div class="input-group-addon">$</div>
                        {{ Form::text('total',0,['id'=>'total','class'=>'form-control','readonly'=>'true']) }}
                    </div>
                </div>
            </div>
        </div>

<div class="row">
    <div class="col-md-10 ">
        <!-- Address Form Input -->
        <div class="form-group">
            {{ Form::label('birth_date','Dirección:') }}
            {{ Form::text('address',null,['class'=>'form-control','required'=>'required']) }}
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-10 ">
        <!-- Note Form Input -->
        <div class="form-group">
            {{ Form::label('birth_date','Notas adicionales:') }}
            {{ Form::textarea('note',null,['class'=>'form-control','rows'=>'5']) }}
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
<br>
@stop