<div class="row">
    <div class="col-xs-4">
        <div class="form-group">
            {{ Form::label('from_retribution_per_user_granted','Retribución por usuario:') }} <i class="glyphicon glyphicon-info-sign pull-right help"  data-content="Asdfg..."></i>
            <div class="input-group">
                {{ Form::text('from_retribution_per_user_granted',null,['class'=>'form-control','placeholder'=>'Ej: 5','required'=>true,]) }}
                <div class="input-group-addon">%</div>
            </div>
        </div>
    </div>
    <div class="col-xs-4">
        <div class="form-group">
            {{ Form::label('from_limit_per_user_granted','Límite por usuario por mes:') }}<i class="glyphicon glyphicon-info-sign pull-right help"  data-content="Asdfg..."></i>
            <div class="input-group">
                <div class="input-group-addon">$</div>
                {{ Form::text('from_limit_per_user_granted',null,['class'=>'form-control','placeholder'=>'Ej: 20000','required'=>true]) }}
            </div>
        </div>
    </div>
    <div class="col-xs-4">
        <div class="form-group">
            {{ Form::label('from_limit_total_granted','Límite total por mes:') }}<i class="glyphicon glyphicon-info-sign pull-right help"  data-content="Asdfg..."></i>
            <div class="input-group">
                <div class="input-group-addon">$</div>
                {{ Form::text('from_limit_total_granted',null,['class'=>'form-control','placeholder'=>'Ej: 800000','required'=>true]) }}
            </div>
        </div>
    </div>
</div>