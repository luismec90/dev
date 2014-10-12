@extends('layouts.default')

@section('css')
{{ HTML::style('assets/libs/bootstrapvalidator/css/bootstrapValidator.min.css') }}
@stop

@section('js')
{{ HTML::script('assets/libs/bootstrapvalidator/js/bootstrapValidator.js') }}
{{ HTML::script('assets/libs/bootstrapvalidator/js/language/es_ES.js') }}
{{ HTML::script('assets/js/validation.js') }}
@stop

@section('content')
<section id="contact" class="section  section-contact">
    <div class="container">
        <h2 class="section-title"><span>Mis tiendas</span></h2>
        <div class="main-action">
             <div class="row">
                <br><br>
                <div class="col-xs-12">
                @if(!empty($shops))

                <table class="table table-bordered table-striped">
                <tr>
                <th>Establecimiento</th>
                <th>Ver página</th>
                <th>Saldo</th>
                </tr>

                @foreach($shops as $shop)
                <tr>
                <td>{{ $shop->name }}</td>
                <td><a href="{{ route('shop_path',$shop->link) }}" class="btn btn-primary btn-sm">Ver página web </a></td>
                <td>$ {{ Auth::user()->saldo($shop->id)  }}</td>
                </tr>
                @endforeach
                </table>

                <br>


                {{-- <table class="table table-striped">
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
                </table> --}}

                                @endif
                            </div>
                        </div>
        </div>
    </div>
</section>

@stop