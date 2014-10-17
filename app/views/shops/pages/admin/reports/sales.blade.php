@extends('shops.layouts.default')

@section('js')
{{ HTML::script('assets/themes/one/js/sales_report.js')}}
<script>

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
            <div class="col-xs-12">
            <a class="btn btn-primary pull-right" href="{{ route('export_sales_report_path',$shop->link) }}?category={{ Input::has('category')?Input::get('category'):'' }}&product={{ Input::has('product')?Input::get('product'):'' }}&since={{ Input::has('since')?Input::get('since'):'' }}&until={{ Input::has('until')?Input::get('until'):'' }}">Exportar a Excel</a>
                <h3 class="no-margin">Reporte de ventas</h3>
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

        <div class="row">
            {{ Form::open(['route'=>['sales_report_path',$shop->link],'method'=>'GET','class'=>'form-submit']) }}
                    <div class="col-md-3">
                             <div class="form-group">
                                {{ Form::label('category','Categoría:') }}
                                {{ Form::select('category',$selectCategories,Input::has('category') ? Input::get('category') : '',['id'=>'category','class'=>'form-control']) }}
                            </div>
                    </div>
                    <div class="col-md-3">
                             <div class="form-group">
                                {{ Form::label('product','Producto:') }}
                                {{ Form::select('product',[''=>''],null,['id'=>'product','class'=>'form-control','readonly'=>'true','data-product-selected'=>Input::has('product') ? Input::get('product') : '']) }}
                            </div>
                    </div>
                    <div class="col-md-2">
                        <div class="form-group">
                        {{ Form::label('since','Desde:') }}
                        {{ Form::text('since',Input::has('since') ? Input::get('since') : '',['id'=>'since','class'=>'form-control datepicker']) }}
                        </div>
                    </div>
                     <div class="col-md-2">
                        <div class="form-group">
                        {{ Form::label('until','Hasta:') }}
                        {{ Form::text('until',Input::has('until') ? Input::get('until') : '',['id'=>'until','class'=>'form-control datepicker']) }}
                        </div>
                    </div>
                    <div class="col-md-1">
                        <div class="form-group">
                            <br>
                            <button type="submit" title="Buscar" class="btn btn-primary"><i class="fa fa-search"></i></button>
                        </div>
                    </div>
                    <div class="col-md-1">
                        <div class="form-group">
                            <br>
                            <a class="btn btn-default" title="Limpiar formulario" href="{{ route('sales_report_path',$shop->link) }}"><i class="fa fa-refresh"></i></a>
                        </div>
                    </div>
            {{ Form::close() }}
        </div>

        <div class="row">
            <div class="col-xs-12">
                <table class="table table-hover table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>Producto</th>
                            <th>Cantidad</th>
                            <th>Total</th>
                            <th>Cliente</th>
                            <th>Fecha</th>
                        </tr>
                    </thead>
                    @foreach($sales as $sale)
                        <tr>
                            <td>{{ $sale->product_name }}</td>
                            <td>{{ $sale->amount }}</td>
                            <td>$ {{ $sale->cost }}</td>
                            <td>
                                @if(!is_null($sale->user_id))
                                    {{ User::linkUserEmail($sale->user_id,$shop->id) }}
                                @endif
                            </td>
                            <td>{{ $sale->created_at }}</td>
                        </tr>
                    @endforeach
                </table>

            </div>
        </div>
        <div class="row">
            <div class="col-xs-12">
                <div class="well text-center">
               <h4> <span class="text-warning">Total: $ {{ $total }}</span> </h4>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-12">
                {{ $sales->links(); }}
            </div>
        </div>
    </div>
</div>
@stop