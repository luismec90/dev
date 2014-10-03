@extends('layouts.default')

@section('css')
{{ HTML::style('assets/libs/bootstrapvalidator/css/bootstrapValidator.min.css') }}
{{ HTML::style('assets/css/registro.css') }}
@stop

@section('js')
{{ HTML::script('assets/libs/bootstrapvalidator/js/bootstrapValidator.js') }}
{{ HTML::script('assets/libs/bootstrapvalidator/js/language/es_ES.js') }}
{{ HTML::script('assets/js/validation.js') }}
@stop

@section('content')
<section id="contact" class="section section-center section-contact">
    <div class="container">
        <h2 class="section-title"><span>Búsqueda</span></h2>
        <div class="main-action">
            <div class="row">
             <div class="row">
                <div class="col-md-12 text-center">
                    <h4>
                    Que deseas hacer hoy?
                    </h4>
                    <div class="row">
                        <br>
                        <div class="col-sm-2 col-sm-offset-3">
                            <input type="text" placeholder="Lugar" class="form-control">
                        </div>
                        <div class="col-sm-2">
                            <select class="form-control">
                                <option>Actividad</option>
                                <option>Comer</option>
                                <option>Comprar Ropa</option>
                            </select>
                        </div>
                        <div class="col-sm-2">
                            <button class="btn btn-primary btn-block">Buscar</button>
                        </div>
                    </div>
            </div>
                </div>
            <div class="row">
            <br><br>
             <div class="col-xs-12">
                @if(isset($shops))
                    <table class="table table-striped">
                        <tr>
                            <td>Tienda</td>
                            <td>info</td>
                            <td>Sitio web</td>
                        </tr>
                        @foreach($shops as $shop)
                            <tr>
                                <td>{{ $shop->name }}</td>
                                <td></td>
                                <td>{{ link_to_route('shop_path','Ver',[$shop->link]) }}</td>
                            </tr>
                        @endforeach
                    </table>
                @endif
            </div>
             </div>
        </div>
    </div>
</section>

@stop