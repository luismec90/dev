@extends('layouts.default')

@section('css')

@stop

@section('js')

@stop

@section('content')
<section id="contact" class="section  section-contact">
    <div class="container">
        <h2 class="section-title"><span>Establecimientos afiliados</span></h2>
        <div class="main-action">


       <p>Si eres un establecimiento comercial y  deseas ser parte de nuestra red por favor <a class="btn btn-primary" href="{{ route('contact_path') }}">contáctanos</a>
        </p>


        <table class="table table-bordered table-striped">
        <tr>
        <th></th>
        <th>Establecimiento</th>
        <th>Ver página</th>

        </tr>

        @foreach($shops as $shop)
                <tr>
                 <td>{{ $shop->name }} </td>
                <td>{{ $shop->name }} </td>
                <td><a href="{{ route('shop_path',$shop->link) }}" class="btn btn-primary btn-sm">Ver página web </a></td>
                </tr>
        @endforeach
        </table>

        </div>
    </div>
</section>

@stop