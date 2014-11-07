@extends('shops.layouts.default')

@section('css')
{{ HTML::style('assets/libs/bootstrapvalidator/css/bootstrapValidator.min.css') }}
@stop

@section('js')
{{ HTML::script('assets/libs/bootstrapvalidator/js/bootstrapValidator.js') }}
{{ HTML::script('assets/libs/bootstrapvalidator/js/language/es_ES.js') }}
{{ HTML::script('assets/js/validation.js') }}
{{ HTML::script('assets/themes/one/js/relate_product_stock.js') }}
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
            <div class="col-xs-10">
                @if($product->publish==1)
                    <a href="{{ URL::route('product_path',[$shop->link,$category->name,$product->name]) }}" class="btn btn-primary" title=""><i class="fa fa-reply"></i> Volver atrás</a>
                @else
                    <a href="{{ URL::route('admin_products_path',[$shop->link,$category->id]) }}" class="btn btn-primary" title=""><i class="fa fa-reply"></i> Volver atrás</a>
                @endif
            </div>
        </div>
        <div class="row">
            <div class="col-xs-12">
                <br>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-12">
                <buutton id="btn-modal-add-stock" class="btn btn-primary pull-right">Agregar ingrediente</buutton>
                <h3 class="no-margin"> {{ $product->name }}</h3>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 ">
                <hr>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-12">
                <table id="table-stock" class="table table-hover table-striped table-bordered">
                    <thead>
                        <tr>
                            <td>Ingrediente</td>
                            <td>Cantidad</td>
                            <td>Opciones</td>
                        </tr>
                        @foreach($product->stocks as $stock)
                        <tr>
                            <td>{{ $stock->name }}</td>
                            <td>{{ $stock->pivot->stock_spent.' '.$stock->unit->name }}</td>
                            <td>
                                <button class="btn btn-primary btn-sm btn-edit-stock"
                                data-stock-id="{{ $stock->id }}"
                                data-amount="{{ $stock->pivot->stock_spent }}"
                                >
                                    Editar
                                </button>

                                <button class="btn btn-danger btn-sm btn-delete-stock"
                                data-stock-id="{{ $stock->id }}">
                                    Eliminar
                                </button>
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
      <div class="modal fade" id="modal-add-stock" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
          <div class="modal-dialog">
              <div class="modal-content">
                  {{ Form::open(['route'=>['store_relate_stock_product_path',$shop->link,$category->id,$product->id],'id'=>'form-add-stock','class'=>'validate form-horizontal']) }}
                  <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                      <h4 class="modal-title" id="myModalLabel">Agregar ingrediente</h4>
                  </div>
                  <div class="modal-body">
                      <div class="form-group">
                          <label class="col-sm-4 control-label">Ingrediente:</label>
                          <div class="col-sm-4">
                              <select id="stock" name="stock_id" class="form-control" required="trrue">
                                  <option value="">Seleccionar...</option>
                                  @foreach($stocks as $stock)
                                      <option value="{{ $stock->id }}" data-unit="{{ $stock->unit->name }}">{{ $stock->name }}</option>
                                  @endforeach
                              </select>
                          </div>
                      </div>
                      <div id="div-amount" class="form-group">
                          <label class="col-sm-4 control-label">Cantidad requerida:</label>
                          <div class="col-sm-4">
                              <div class="input-group">
                                  {{ Form::text('amount',null,['class'=>'form-control','required'=>'true']) }}
                                  <div id="unit" class="input-group-addon"></div>
                              </div>
                          </div>
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

<!-- Modal -->
<div class="modal fade" id="modal-delete-stock" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            {{ Form::open(['route'=>['destroy_relate_stock_product_path',$shop->link,$category->id,$product->id],'id'=>'form-add-stock','class'=>'validate form-horizontal','method'=>'DELETE']) }}
            {{ Form::hidden('stock_id',null,['id'=>'stock_id']) }}
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <h4 class="modal-title" id="myModalLabel">Eliminar ingrediente</h4>
            </div>
            <div class="modal-body">
                ¿Realmente desea eliminar este ingrediente?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                <button type="submit" class="btn btn-primary">Enviar</button>
            </div>
            {{ Form::close() }}
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="modal-edit-stock" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            {{ Form::open(['route'=>['update_relate_stock_product_path',$shop->link,$category->id,$product->id],'id'=>'form-add-stock','class'=>'validate form-horizontal']) }}
           {{ Form::hidden('old_stock_id',null,['id'=>'old_stock_id']) }}
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <h4 class="modal-title" id="myModalLabel">Editar ingrediente</h4>
            </div>
            <div class="modal-body">
                  <div class="form-group">
                      <label class="col-sm-4 control-label">Ingrediente:</label>
                      <div class="col-sm-4">
                          <select id="edit-stock" name="stock_id" class="form-control" required="trrue">
                              <option value="">Seleccionar...</option>
                              @foreach($stocks as $stock)
                                  <option value="{{ $stock->id }}" data-unit="{{ $stock->unit->name }}">{{ $stock->name }}</option>
                              @endforeach
                          </select>
                      </div>
                  </div>
                  <div id="div-amount" class="form-group">
                      <label class="col-sm-4 control-label">Cantidad requerida:</label>
                      <div class="col-sm-4">
                          <div class="input-group">
                              {{ Form::text('amount',null,['id'=>'edit-amount','class'=>'form-control','required'=>'true']) }}
                              <div id="edit-unit" class="input-group-addon"></div>
                          </div>
                      </div>
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