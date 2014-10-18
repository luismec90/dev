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
                        {{ Form::text('since',Input::has('since') ? Input::get('since') : date('Y-m-d'),['id'=>'since','class'=>'form-control datepicker']) }}
                        </div>
                    </div>
                     <div class="col-md-2">
                        <div class="form-group">
                        {{ Form::label('until','Hasta:') }}
                        {{ Form::text('until',Input::has('until') ? Input::get('until') : date('Y-m-d'),['id'=>'until','class'=>'form-control datepicker']) }}
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
                <table id="table-report" class="table table-hover table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>Cliente</th>
                            <th>Producto | cantidad | precio</th>
                            <th>Total</th>
                            <th>Fecha</th>
                            <th>Cancelar</th>
                        </tr>
                    </thead>
                    @foreach($bills as $bill)
                        <tr class="{{ $bill->deleted_at ? 'sale-canceled':'' }}">
                            <td>
                                @if(!is_null($bill->user))
                                    {{ User::linkUserEmail($bill->user->id,$shop->id) }}
                                @endif
                            </td>
                            <td>

                                    @foreach($bill->purchases as $purchase )
                                        <div>- {{ $purchase->product_name  }} | {{ $purchase->amount }} |  {{ Shop::showMoney($purchase->cost)  }}</div>
                                    @endforeach
                            </td>
                             <td>{{ Shop::showMoney($bill->total_cost) }}</td>
                            <td>{{ $bill->created_at }}</td>
                            <td>
                                @if( !$bill->deleted_at)
                                    <button class="btn btn-danger delete-sale" data-id-bill="{{ $bill->id }}"><span class="glyphicon glyphicon-trash"></span></button>
                                @else
                                <i class="fa fa-exclamation-triangle"  data-toggle="tooltip" data-placement="bottom" title="Esta venta fue cancelada el {{ $bill->deleted_at }}"></i>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                </table>

            </div>
        </div>
        <div class="row">
            <div class="col-xs-12">
                <div class="well text-center">
               <h4> <span class="text-warning">Total: {{ Shop::showMoney($total) }}</span> </h4>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-12">
                {{ $bills->links(); }}
            </div>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="modal-delete-bill" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <h4 class="modal-title" id="myModalLabel">Cancelar venta</h4>
      </div>
        {{ Form::open(['route'=>['delete_bill_path',$shop->link],'class'=>'validate form-submit','method'=>'DELETE']) }}
            <div class="modal-body">
                {{ Form::hidden('bill_id',null,['id'=>'bill_id']) }}
                ¿Realmente desea cancelar esta venta?
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                <button type="submit" class="btn btn-danger">Enviar</button>
            </div>
        {{ Form::close() }}
    </div>
  </div>
</div>
@stop