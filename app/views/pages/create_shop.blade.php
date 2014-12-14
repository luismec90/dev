@extends('layouts.default')

@section('css')
{{ HTML::style('assets/libs/select2/select2.css') }}
{{ HTML::style('assets/libs/select2/select2-bootstrap.css') }}
{{ HTML::style('assets/css/createShop.css') }}
@stop

@section('js')
{{ HTML::script('assets/libs/select2/select2.js') }}
{{ HTML::script('assets/js/createShop.js') }}
@stop

@section('content')
<section class="section  section-cta">
    <div class="container">
        <h2 class="section-title"><span>Crear establecimiento</span></h2>
        <div class="col-sm-6 col-sm-offset-3">

            @include('layouts.partials.errors')

            {{ Form::open(['id'=>'form-create-shop','route'=>'store_shop_path','novalidate'=>true]) }}

            <!-- Nombre Form Input -->
            <div class="form-group">
                {{ Form::label('name','Nombre del establecimiento:') }} <i class="glyphicon glyphicon-info-sign pull-right help"  data-content="Ejemplo: Por ejemplo: Restaurante Noma"></i>
                {{ Form::text('name',null,['class'=>'form-control','required'=>'required']) }}
            </div>

            <!-- Link Form Input -->
            <div class="form-group">
            {{ Form::label('link','Link:') }}<i class="glyphicon glyphicon-info-sign pull-right help"  data-content="Se recomienda que el link sea el mismo nombre del establecimiento pero en minuculas, sin espacios en blanco, tildes o signos de puntuación. Ejemplo: restaurantemoma"></i>
            <div class="input-group">
                <div class="input-group-addon">www.linkingshops.com/</div>
                {{ Form::text('link',null,['class'=>'form-control','required'=>'required']) }}
            </div>
            </div>

            <!-- Location Form Input -->
            <div id="div-location" class="form-group obligatorio">
                {{ Form::label('town_id','Ubicación:') }}
                {{ Form::select('town_id',$selectTowns,null,['class'=>'form-control']) }}

            </div>

            <!-- Dirección Form Input -->
            <div class="form-group">
                {{ Form::label('street_address','Dirección:') }}
                {{ Form::text('street_address',null,['class'=>'form-control','required'=>'required']) }}
            </div>

            <!-- Email Form Input -->
            <div class="form-group">
                {{ Form::label('email','E-mail del establecimiento:') }}
                {{ Form::text('email',Auth::user()->email,['class'=>'form-control','required'=>'required']) }}
            </div>
            <!--
            <div class="row">
                <div class="col-xs-6">

                    <div class="form-group">
                        {{ Form::label('retribution','Retribución:') }}<i class="glyphicon glyphicon-info-sign pull-right help"  data-content="first tooltip asdasd asd adsf asdf asdfasdfasdf afsd"></i>
                        <div class="input-group">
                            {{ Form::text('retribution',null,['class'=>'form-control','required'=>'required']) }}
                            <div class="input-group-addon">%</div>
                        </div>
                    </div>
                </div>
                <div class="col-xs-6">

                    <div class="form-group">
                        {{ Form::label('balance_deadline','Tiempo de vida del saldo:') }}<i class="glyphicon glyphicon-info-sign pull-right help"  data-content="first tooltip asdasd asd adsf asdf asdfasdfasdf afsd"></i>
                        <div class="input-group">
                            {{ Form::text('balance_deadline',null,['class'=>'form-control','required'=>'required']) }}
                            <div class="input-group-addon">días</div>
                        </div>
                    </div>
                </div>
            </div>
            -->


            <!-- Nombre del administrador Form Input -->
            <div class="form-group">
                {{ Form::label('administrator_name','Nombre del administrador:') }}
                {{ Form::text('administrator_name',Auth::user()->fullName(),['class'=>'form-control','required'=>true]) }}
            </div>

           <!-- Número celular del administrador Form Input -->
           <div class="form-group">
               {{ Form::label('cell','Número télefonico o celular de contacto:') }}
               {{ Form::text('cell',null,['class'=>'form-control','required'=>'required']) }}
           </div>

            {{--

            <div class="row">
                <div class="col-xs-12">
                    <label>Seleccione las categorias que identifiquen el establecimiento:</label>
                </div>
            </div>

            <div id="div-activities" class="row obligatorio">
                @foreach($activities as $activity)
                    <div class="col-xs-3">
                        <div class="form-group">
                            <div class="checkbox">
                                <label>
                                    {{ Form::checkbox('activities[]', $activity->id) }}
                                    {{ $activity->name }}
                                </label>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        --}}
            <div class="row">
                <div class="col-xs-12">
                    <hr>
                </div>
            </div>

            <div class="form-group">
                <div class="row">
                    <div class="col-md-3 col-sm-3 col-xs-12">
                        {{ Form::button('Enviar',['id'=>'submit-form','class'=>'btn btn-primary btn-block']) }}
                    </div>
                </div>
            </div>

            {{ Form::close() }}
        </div>
    </div>
</section>

@stop