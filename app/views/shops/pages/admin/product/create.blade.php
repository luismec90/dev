@extends('shops.layouts.default')


@section('css')
{{ HTML::style('assets/libs/bootstrapvalidator/css/bootstrapValidator.min.css') }}
@stop

@section('js')
{{ HTML::script('assets/libs/bootstrapvalidator/js/bootstrapValidator.js') }}
{{ HTML::script('assets/libs/bootstrapvalidator/js/language/es_ES.js') }}
{{ HTML::script('assets/js/validation.js') }}
{{ HTML::script('assets/themes/one/js/product.js') }}
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
        <div class="col-md-10">
            @include('layouts.partials.errors')
        </div>
    </div>

    <div class="row">
        <div class="col-xs-10">
            <a href="{{ URL::route('admin_products_path',[$shop->link,$category->id]) }}" class="btn btn-primary" title=""><i class="fa fa-reply"></i> Volver atras</a>
        </div>
    </div>

    <div class="row">
        <div class="col-xs-10">
            <br>
        </div>
    </div>

    <div class="row">
        <div class="col-xs-12">
            <h3 class="no-margin"> Crear producto en la categoría: {{ $category->name }}</h3>
            <hr>
        </div>
    </div>





    {{ Form::open(['route'=>['admin_store_product_path',$shop->link,$category->id],'class'=>'validate']) }}
        <div class="row">
            <div class="col-md-10 ">
                <br>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="row">
                    <div class="col-xs-12">
                        <div id="photo1-product" class="img-thumbnail"></div>
                    </div>
                </div>
                 <div class="row">
                    <div class="col-xs-12">
                        <br>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-10">
                        <div class="form-group">
                            <div class="input-group">
                                <input type="text" class="form-control" readonly="">
                                <span class="input-group-btn">
                                   <span class="btn btn-primary btn-file">
                                       Foto del producto
                                       {{ Form::file('avatar',['id'=>'file-photo1','accept'=>'image/*','required'=>'true']) }}
                                   </span>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
         <div class="row">
            <div class="col-md-10 ">
                <hr>
            </div>
        </div>
        <div class="row">
           <div class="col-md-12">
              <div class="row">
                  <div class="col-xs-12">
                      <div id="photo2-product" class="img-thumbnail"></div>
                  </div>
              </div>
               <div class="row">
                  <div class="col-xs-12">
                      <br>
                  </div>
              </div>
              <div class="row">
                  <div class="col-sm-10">
                      <div class="form-group">
                          <div class="input-group">
                              <input type="text" class="form-control" readonly="">
                              <span class="input-group-btn">
                                 <span class="btn btn-primary btn-file">
                                     Foto del producto
                                     {{ Form::file('cover',['id'=>'file-photo2','accept'=>'image/*','required'=>'true']) }}
                                 </span>
                              </span>
                          </div>
                      </div>
                  </div>
              </div>
          </div>
        </div>

         <div class="row">
            <div class="col-md-10 ">
                <hr>
            </div>
        </div>

        <div class="row">
            <div class="col-md-10">
                <!-- Nombre Form Input -->
                <div class="form-group">
                    {{ Form::label('name','Nombre:') }}
                    {{ Form::text('name',null,['class'=>'form-control','required'=>'required']) }}
                 </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-10">
                <!-- Precio Form Input -->
                <div class="form-group">
                    {{ Form::label('price','Precio:') }}
                    {{ Form::number('price',null,['class'=>'form-control','required'=>'required']) }}
                 </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-10">
                <!-- Servicio a domicilio -->
                <div class="checkbox">
                    <label>
                        {{ Form::checkbox('delivery_service', '1'); }} Servicio a domicilio
                    </label>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-10">
                <!-- Descripción Form Input -->
                <div class="form-group">
                    {{ Form::label('description','Descripción:') }}
                    {{ Form::textarea('description',null,['class'=>'form-control','required'=>'required']) }}
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

        </div>
    </div>
    {{ Form::close() }}
</div>
<!-- Modal -->
<div class="modal fade" id="modal-eliminar-categoria" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        {{ Form::open(['route'=>['admin_destroy_category_path',$shop->link,$category->id],'method'=>'DELETE']) }}
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                    <h4 class="modal-title" id="myModalLabel">Eliminar categoría</h4>
                </div>
                <div class="modal-body">
                    {{ Form::hidden('name',$category->id,['required'=>'required']) }}
                    Esta seguro de eliminar permanentemente esta categoría?
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