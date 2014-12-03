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

            {{ Form::open(['route'=>'store_shop_path']) }}

            <!-- Nombre Form Input -->
            <div class="form-group">
             {{ Form::label('Name','Nombre del establecimiento:') }} <i class="glyphicon glyphicon-info-sign pull-right help"  data-content="first tooltip asdasd asd adsf asdf asdfasdfasdf afsd"></i>
            {{ Form::text('name',null,['class'=>'form-control','required'=>'required']) }}
            </div>

            <!-- Link Form Input -->
            <div class="form-group">
            {{ Form::label('link','Link:') }}<i class="glyphicon glyphicon-info-sign pull-right help"  data-content="first tooltip asdasd asd adsf asdf asdfasdfasdf afsd"></i>
            <div class="input-group">
                <div class="input-group-addon">www.linkingshops.com/</div>
                {{ Form::text('link',null,['class'=>'form-control','required'=>'required']) }}
            </div>
            </div>

            <!-- Location Form Input -->
            <div class="form-group">
                {{ Form::label('town','Ubicación:') }}<i class="glyphicon glyphicon-info-sign pull-right help"  data-content="first tooltip asdasd asd adsf asdf asdfasdfasdf afsd"></i>
                <select id="town" name="town" class="form-control">
                    <option></option>
                    @foreach($towns as $town)
                        <option value="{{ $town->id }}">{{ $town->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="row">
                <div class="col-xs-6">
                    <!-- Retribución Form Input -->
                    <div class="form-group">
                        {{ Form::label('retribution','Retribución:') }}<i class="glyphicon glyphicon-info-sign pull-right help"  data-content="first tooltip asdasd asd adsf asdf asdfasdfasdf afsd"></i>
                        <div class="input-group">
                            {{ Form::text('retribution',null,['class'=>'form-control','required'=>'required']) }}
                            <div class="input-group-addon">%</div>
                        </div>
                    </div>
                </div>
                <div class="col-xs-6">
                    <!-- Balance Deadline Form Input -->
                    <div class="form-group">
                        {{ Form::label('balance_deadline','Tiempo de vida del saldo:') }}<i class="glyphicon glyphicon-info-sign pull-right help"  data-content="first tooltip asdasd asd adsf asdf asdfasdfasdf afsd"></i>
                        <div class="input-group">
                            {{ Form::text('balance_deadline',null,['class'=>'form-control','required'=>'required']) }}
                            <div class="input-group-addon">días</div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Nombre del administrador Form Input -->
            <div class="form-group">
                {{ Form::label('administrator','Nombre del administrador:') }}<i class="glyphicon glyphicon-info-sign pull-right help"  data-content="first tooltip asdasd asd adsf asdf asdfasdfasdf afsd"></i>
                {{ Form::text('administrator',null,['class'=>'form-control','required'=>true]) }}
            </div>

           <!-- Número celular del administrador Form Input -->
           <div class="form-group">
               {{ Form::label('cellphone','Número celular del administrador:') }}<i class="glyphicon glyphicon-info-sign pull-right help"  data-content="first tooltip asdasd asd adsf asdf asdfasdfasdf afsd"></i>
               {{ Form::text('cellphone',null,['class'=>'form-control','required'=>'required']) }}
           </div>

            <div class="form-group">
                <div class="row">
                    <div class="col-md-3 col-sm-3 col-xs-12">
                        {{ Form::submit('Enviar',['class'=>'btn btn-primary btn-block']) }}
                    </div>
                </div>
            </div>

            {{ Form::close() }}
        </div>
    </div>
</section>

@stop