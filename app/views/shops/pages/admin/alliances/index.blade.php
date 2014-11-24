@extends('shops.layouts.default')

@section('css')
{{ HTML::style('assets/libs/select2/select2.css') }}
{{ HTML::style('assets/libs/select2/select2-bootstrap.css') }}
@stop

@section('js')
{{ HTML::script('assets/libs/select2/select2.js') }}
{{ HTML::script('assets/themes/one/js/alliances.js') }}
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
                <h3 class="no-margin">Alianzas</h3>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-12">
                <hr>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-12">
                <ul  class="nav nav-tabs">
                    <li class="active">
                        <a >Buscar aliados</a>
                    </li>
                    <li>
                        <a>Alianzas en proceso</a>
                    </li>
                    <li>
                        <a>Alianzas activas</a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-12">
                <br>
            </div>
        </div>
        <div  class="row">
            <div class="col-xs-12">
                <div class="row">
                    {{ Form::open(['method'=>'GET']) }}
                        <div class="col-xs-5">
                            <label>Seleccione una ciudad:</label>
                            <select id="town" name="town" class="form-control">
                                <option></option>
                                @foreach($towns as $town)
                                    <option value="{{ $town->id }}" {{ $selectedTown==$town->id ? 'selected':''; }}>{{ $town->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-xs-5">
                            <label>Seleccionar una categoría:</label>
                            <select id="activity" name="activity" class="form-control">
                                <option></option>
                                @foreach($activities as $activity)
                                    <option value="{{ $activity->id }}" {{ $selectedActivity==$activity->id ? 'selected':''; }}>{{ $activity->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-xs-2">
                            <br>
                            <button type="submit" class="btn btn-primary">Buscar</button>
                        </div>
                    {{ Form::close() }}
                </div>
                <div class="row">
                    <div class="col-xs-12">
                        <br>
                    </div>
                </div>
                <div  class="row">
                    <div class="col-xs-12">
                        @if(!empty($shops))
                            <table class="table table-bordered" >
                                <tr>
                                    <td>Imagen</td>
                                    <td>Nombre</td>
                                    <td>Descripción</td>
                                    <td>Opciones</td>
                                </tr>
                                @foreach($shops as $shop)
                                    <tr>
                                        <td class="col-xs-2">
                                            <img class="img-thumbnail " src="{{ $shop->pathPreviwImage() }}">
                                        </td>
                                        <td> {{ $shop->name }} </td>
                                        <td> {{ $shop->about }} </td>
                                        <td>
                                            <button class="btn btn-danger btn-request-alliance">Solicitar alianza </button>
                                            <br>
                                            <br>
                                            <a href="{{ route('localization_path',$shop->link) }}" class="btn btn-default" target="_blank">Ver localización </a>
                                        </td>
                                    </tr>
                                @endforeach
                            </table>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Modal -->
<div class="modal fade" id="modal-request-alliance" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <h4 class="modal-title">Solicitar Alianza</h4>
      </div>
      <div class="modal-body">

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
        <button type="button" class="btn btn-primary">Enviar</button>
      </div>
    </div>
  </div>
</div>
@stop