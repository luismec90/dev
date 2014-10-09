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

        <table class="table table-bordered table-striped">
        <tr>
        <th>Establecimiento</th>
        <th>Ver página</th>

        </tr>

        @foreach($shops as $shop)
        <tr>
        <td>{{ $shop->name }}</td>
        <td><a href="{{ route('shop_path',$shop->link) }}" class="btn btn-primary btn-sm">Ver página web </a></td>
        </tr>
        @endforeach
        </table>

        </div>
    </div>
</section>

@stop