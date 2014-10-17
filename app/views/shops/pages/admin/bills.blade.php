@extends('shops.layouts.default')


@section('css')
{{-- HTML::style('assets/libs/bootstrapvalidator/css/bootstrapValidator.min.css') --}}
@stop

@section('js')
{{ HTML::script('assets/themes/one/js/bill.js') }}
{{-- HTML::script('assets/libs/bootstrapvalidator/js/bootstrapValidator.js') --}}
{{-- HTML::script('assets/libs/bootstrapvalidator/js/language/es_ES.js') --}}
{{-- HTML::script('assets/js/validation.js') --}}
<script>

    var item='<div class="row item"> <div class="col-md-10"> <div class="well well-sm"> <div class="row"> <div class="col-sm-3"> <div class="form-group"> {{ Form::label("category","Categoria:") }} {{ Form::select("category",$selectCategories,null,["class"=>"form-control categoria","required"=>"true"]) }} </div> </div> <div class="col-sm-4"> <div class="form-group"> {{ Form::label("product","Producto:") }} {{ Form::select("products[]",[""=>""],null,["class"=>"form-control producto","required"=>"true","readonly"=>"true"]) }} </div> </div> <div class="col-sm-2"> <div class="form-group"> {{ Form::label("amounts","Cantidad:") }} {{ Form::number("amounts[]",1,["class"=>"form-control cantidad","required"=>"true"]) }} </div> </div> <div class="col-sm-3"> <div class="form-group"> {{ Form::label("cost","Costo:") }} <div class="input-group"> <div class="input-group-addon">$</div> {{ Form::text("costs[]",null,["class"=>"form-control costo"]) }} </div> </div> </div> </div> </div> </div> <div class="col-md-2"> <a class="btn btn-danger remove"> <i class="fa fa-minus"></i> </a> </div> </div>';

    var retribution="{{ $shop->retribution }}";

    @foreach($shop->categories as $category)
        var category_{{ $category->id }}="<option value=''>Seleccionar...</option>";
        @foreach($category->products as $product)
            category_{{ $category->id }}+="<option value='{{ $product->id }}' data-price='{{ $product->price }}'>{{ $product->name }}</option>"
        @endforeach
    @endforeach

</script>
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
            <div class="col-xs-10">
                <h3 class="no-margin">Realizar venta</h3>
            </div>
        </div>

        <div class="row">
            <div class="col-xs-12">
                <hr>
            </div>
        </div>

        <div class="row">
            <div class="col-md-10">
                @include('layouts.partials.errors')
            </div>
        </div>

        {{ Form::open(['route'=>['bill_path',$shop->link],'class'=>'validate']) }}
        <div class="row">
            <div class="col-md-10 ">
                <!-- Email Form Input -->
                <div class="form-group">
                    {{ Form::label('email','Email del comprador:') }}
                    {{ Form::email('email',null,['id'=>'email','class'=>'form-control']) }}
                </div>
            </div>
        </div>
        <div id="retribution-zone" >
             <div class="row ocultar1 ocultar">
                <div class="col-md-10 ">
                    <div class="form-group">
                        <div class="checkbox">
                            <label>
                                <input id="check-balance" type="checkbox" data-retribution="0">
                                El usuario <em id="nombre-usuario" class="text-info"></em> tiene disponibles $ <em id="info-balance" class="text-info"></em>. ¿Desea redimirlos?
                            </label>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row ocultar2 ocultar">
                <div class="col-md-5">
                    <!-- Email Form Input -->
                    <div class="form-group">
                        {{ Form::label('balance','Saldo a redimir:') }}
                        {{ Form::text('balance',0,['id'=>'balance','class'=>'form-control','required'=>'true']) }}
                    </div>
                </div>
                <div class="col-md-5">
                    <!-- Email Form Input -->
                    <div class="form-group">
                        {{ Form::label('code','Código de verificación') }}
                        {{ Form::text('code',0,['id'=>'code','class'=>'form-control','required'=>'true']) }}
                    </div>
                </div>
            </div>
        </div>

        <div id="products">
            <div class="row item">
                <div class="col-md-10">
                    <div class="well well-sm">
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
                                       {{ Form::text("costs[]",null,["class"=>"form-control costo"]) }}
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
            <div class="col-md-10">
                <div class="row">
                    <div class="col-sm-6">
                        <!-- Publish -->
                        <div class="checkbox">
                            <label>
                                {{ Form::checkbox('no_register_products', '1',false,['id'=>'no_register_products']); }} Registrar únicamente el total a pagar
                            </label>
                        </div>
                    </div>
                </div>

                <div class="row">

                    <div class="col-sm-3">
                        <!-- Total Form Input -->
                        <div class="form-group">
                            {{ Form::label('category','Saldo ganado:') }}
                            <div class="input-group">
                                <div class="input-group-addon">$</div>
                                 {{ Form::text('retribution',0,['id'=>'retribution','class'=>'form-control','readonly'=>'true']) }}
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-3">
                        <!-- Total Form Input -->
                        <div class="form-group">
                                {{ Form::label('category','Subtotal:') }}
                            <div class="input-group">
                                <div class="input-group-addon">$</div>
                                 {{ Form::text('subtotal',0,['id'=>'subtotal','class'=>'form-control','readonly'=>'true']) }}
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-3">
                        <!-- Total Form Input -->
                        <div class="form-group">
                                {{ Form::label('balance_redeemed','Saldo redimido:') }}
                            <div class="input-group">
                                <div class="input-group-addon">$</div>
                                 {{ Form::text('balance_redeemed',0,['id'=>'balance_redeemed','class'=>'form-control','readonly'=>'true']) }}
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-3">
                        <!-- Total Form Input -->
                        <div class="form-group">
                            {{ Form::label('category','Total a pagar:',['class'=>'text-danger']) }}
                            <div class="input-group">
                                <div class="input-group-addon">$</div>
                                {{ Form::number('total',0,['id'=>'total','class'=>'form-control','required'=>'true','readonly'=>'true']) }}
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