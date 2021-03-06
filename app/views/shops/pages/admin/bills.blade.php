@extends('shops.layouts.default')


@section('css')
{{ HTML::style('assets/themes/one/css/bills.css') }}
@stop

@section('js')
{{ HTML::script('assets/themes/one/js/bill.js') }}
<script>
    var url_send_form="{{ route("bill_store_path",[$shop->link]) }}";

    var item='<div class="row item"> <div class="col-md-10"> <div class="well well-sm"> <div class="row"> <div class="col-sm-3"> <div class="form-group"> {{ Form::label("category","Categoria:") }} {{ Form::select("category",$selectCategories,null,["class"=>"form-control categoria","required"=>"true"]) }} </div> </div> <div class="col-sm-4"> <div class="form-group"> {{ Form::label("product","Producto:") }} {{ Form::select("products[]",[""=>""],null,["class"=>"form-control producto","required"=>"true","readonly"=>"true"]) }} </div> </div> <div class="col-sm-2"> <div class="form-group"> {{ Form::label("amounts","Cantidad:") }} {{ Form::number("amounts[]",1,["class"=>"form-control cantidad number","required"=>"true"]) }} </div> </div> <div class="col-sm-3"> <div class="form-group"> {{ Form::label("cost","Costo:") }} <div class="input-group"> <div class="input-group-addon">$</div> {{ Form::text("costs[]",null,["class"=>"form-control costo number",'required'=>'true']) }} </div> </div> </div> </div> </div> </div> <div class="col-md-2"> <a class="btn btn-danger remove"> <i class="fa fa-minus"></i> </a> </div> </div>';

    var retribution="{{ $shop->retribution }}";

    var retribution_per_bill="{{ $shop->retribution_per_bill }}";

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
            <div id="div-errors" class="col-md-10">
                @include('layouts.partials.errors')
            </div>
        </div>

        {{ Form::open(['route'=>['bill_store_path',$shop->link],'id'=>'form-bill','class'=>'validate form-submit']) }}
        <div class="row">
            <div class="col-md-7">
                <!-- Email Form Input -->
                <div class="form-group">
                    {{ Form::label('email','Email del comprador:') }}
                    {{ Form::email('email',null,['id'=>'email','class'=>'form-control']) }}
                </div>
            </div>
             <div class="col-md-3">
                <!-- Date Form Input -->
                <div class="form-group">
                    {{ Form::label('date','Fecha de venta:') }}
                    {{ Form::text('date',date('Y-m-d'),['id'=>'date','class'=>'datepicker form-control','required'=>'true']) }}
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
                        <div class="input-group">
                            <div class="input-group-addon">$</div>
                            {{ Form::text('balance',0,['id'=>'balance','class'=>'form-control number','required'=>'true']) }}
                        </div>
                        <p class="help-block">El límite del saldo a redimir por cada compra es del {{ Currency::toFront($shop->retribution_per_bill*100,'')  }}% sobre el total a pagar.</p>
                    </div>
                </div>
                <div class="col-md-5">
                    <!-- Email Form Input -->
                    <div class="form-group">
                        {{ Form::label('code','Código de verificación') }}
                        {{ Form::text('code',0,['id'=>'code','class'=>'form-control','required'=>'true']) }}
                        <p class="help-block">El código de verificación se le debe solicitar al cliente con el fin de comprobar si en efecto es el propietario del email ingresado.</p>
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
                                {{ Form::number('amounts[]',1,['class'=>'form-control cantidad number','required'=>'true']) }}
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <div class="form-group">
                                {{ Form::label('cost','Costo:') }}
                                 <div class="input-group">
                                        <div class="input-group-addon">$</div>
                                       {{ Form::text("costs[]",null,["class"=>"form-control costo number",'required'=>'true']) }}
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
                        <!-- Retribution Form Input -->
                        <div class="form-group">
                            {{ Form::label('category','Saldo ganado:') }}
                            <div class="input-group">
                                <div class="input-group-addon">$</div>
                                 {{ Form::text('retribution',0,['id'=>'retribution','class'=>'form-control number','required'=>'true','readonly'=>'true']) }}
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-3">
                        <!-- Subtotal Form Input -->
                        <div class="form-group">
                                {{ Form::label('category','Total:') }}
                            <div class="input-group">
                                <div class="input-group-addon">$</div>
                                 {{ Form::text('subtotal',0,['id'=>'subtotal','class'=>'form-control number','required'=>'true',   'readonly'=>'true']) }}
                            </div>
                        </div>
                    </div>

                    <div id="div-redimido" class="col-sm-3 hidden">
                        <!-- Balance_redeemed Form Input -->
                        <div class="form-group">
                                {{ Form::label('balance_redeemed','Saldo redimido:') }}
                            <div class="input-group">
                                <div class="input-group-addon">$</div>
                                 {{ Form::text('balance_redeemed',0,['id'=>'balance_redeemed','class'=>'form-control number','readonly'=>'true']) }}
                            </div>
                        </div>
                    </div>

                    <div id="div-total" class="col-sm-3 hidden">
                        <!-- Total Form Input -->
                        <div class="form-group">
                            {{ Form::label('category','Total Final:',['class'=>'text-danger']) }}
                            <div class="input-group">
                                <div class="input-group-addon">$</div>
                                {{ Form::text('total',0,['id'=>'total','class'=>'form-control number','required'=>'true','readonly'=>'true']) }}
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
                        {{ Form::button('Enviar',['id'=>'submit-form','class'=>'btn btn-primary btn-block']) }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
        {{ Form::close() }}
    </div>
</div>
@stop