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
    <div class="col-lg-12">
        <h2 class="shop-title section-title"><span>{{ $shop->name }}</span></h2>
        <br>
    </div>
</div>

<div class="row">
    @include('shops.layouts.partials.left_menu')
    <div class="col-md-9">

        <div class="row">
            <div class="col-md-12">
                @include('layouts.partials.errors')
            </div>
        </div>

        <div class="row">
            <div class="col-xs-12">
                <br>
            </div>
        </div>

        <div class="row">
            <div class="col-xs-12">
                        <a href="{{ route('create_stock_path',$shop->link) }}" class="btn btn-primary pull-right">
                            Crear item
                        </a>
                <h3 class="no-margin"> Inventario</h3>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12 ">
                <hr>
            </div>
        </div>

        <div class="row">
            <div class="col-xs-12">
                <table class="table table-hover table-striped table-bordered">
                    <thead>
                        <tr>
                            <td>Nombre</td>
                            <td>Cantidad</td>
                            <td>Opciones</td>
                        </tr>
                            @foreach($shop->stocks as $stock)
                                <tr>
                                    <td>
                                        {{ $stock->name }}
                                    </td>
                                    <td>
                                        {{ $stock->total_amount.' '.$stock->unit->name }}
                                    </td>
                                    <td>
                                    <a href="{{ route('historic_stock_path',[$shop->link,$stock->id]) }}" class="btn btn-primary btn-sm">Histórico</a>
                                    <button type="button" class="btn btn-primary btn-sm update-amount"
                                     data-stock-id="{{ $stock->id }}"
                                    data-name="{{ $stock->name }}"
                                    data-unit="{{ $stock->unit->name }}"
                                    data-total-amount="{{ $stock->total_amount }}">
                                      Actualizar cantidad
                                    </button>
                                        <a href="{{ route('edit_stock_path',[$shop->link,$stock->id]) }}" class="btn btn-primary btn-sm">Editar item</a>
                                    </td>
                                </tr>
                        @endforeach
                    </thead>

                </table>
            </div>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="modal-update-amount" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      {{ Form::open(['route'=>['update_amount_stock_path',$shop->link],'class'=>'validate form-horizontal']) }}
      {{ Form::hidden('stock_id',null,['id'=>'stock_id']) }}
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <h4 class="modal-title" id="myModalLabel">Actualizar cantidad</h4>
      </div>
      <div class="modal-body">
        <h4 id="stock-name" class="text-center"></h4>
        <hr>
        <div class="form-group">
          <label for="ejemplo_email_3" class="col-sm-4 control-label">Cantidad actual:</label>
          <div class="col-sm-4">
            <div class="input-group">
                <input id="current_amount" type="text" class="form-control" disabled>
                <div class="input-group-addon"></div>
            </div>
          </div>
        </div>
        <div class="form-group">
          <label for="ejemplo_password_3" class="col-sm-4 control-label">Cantidad a adicionar:</label>
          <div class="col-sm-4">
          <div class="input-group">
              <input id="change_amount" type="text" name="change_amount" class="form-control">
              <div class="input-group-addon"></div>
          </div>

        </div>

        </div>
        <div class="form-group">
                 <div class="col-sm-offset-4 col-sm-8">
                 <b>Nota:</b> Si desea hacer un decremento en el total por favor usar el signo menos "-"
                 </div>
                </div>
        <hr>
         <div class="form-group">
          <label for="ejemplo_password_3" class="col-sm-4 control-label">Cantidad total:</label>
          <div class="col-sm-4">
          <div class="input-group">
              <input id="total_amount" type="text" class="form-control" disabled>
              <div class="input-group-addon"></div>
          </div>
            </div>
        </div>
        <div class="form-group">
          <label for="ejemplo_password_3" class="col-sm-4 control-label">Descripción:</label>
            <div class="col-sm-8">
               <textarea name="description" class="form-control" rows="3"></textarea>
            </div>
        </div>
        <div class="form-group">

        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
        <button type="submit" class="btn btn-primary">Enviar</button>
      </div>
       {{ Form::close() }}
    </div>
  </div>
</div>
@stop