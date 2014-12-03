<div class="modal fade" id="modal-request-alliance" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        {{ Form::open(["id"=>"form-request-alliance","route"=>$route,'novalidate'=>true]) }}
            {{ Form::hidden('to',null,['id'=>'to','required'=>'required']) }}
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Cerrar</span></button>
                    <h4 class="modal-title" id="modal-request-alliance-label">{{ $title }}</h4>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-xs-12">
                            <h3 id="shop-name" class="text-center"></h3>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-12">
                            <div class="well well-sm">
                                <fieldset>
                                    <legend>Propuesta a enviar:</legend>
                                    <div class="row">
                                        <div class="col-xs-4">
                                            <div class="form-group">
                                                {{ Form::label('from_retribution_per_user_granted','Retribución por usuario:') }}
                                                <div class="input-group">
                                                    {{ Form::text('from_retribution_per_user_granted',null,['class'=>'form-control','placeholder'=>'Ej: 5']) }}
                                                    <div class="input-group-addon">%</div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xs-4">
                                            <div class="form-group">
                                                {{ Form::label('from_limit_per_user_granted','Límite por usuario:') }}
                                                <div class="input-group">
                                                    <div class="input-group-addon">$</div>
                                                    {{ Form::text('from_limit_per_user_granted',null,['class'=>'form-control','placeholder'=>'Ej: 20000','required'=>'required']) }}
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xs-4">
                                            <div class="form-group">
                                                {{ Form::label('from_limit_total_granted','Límite total:') }}
                                                <div class="input-group">
                                                    <div class="input-group-addon">$</div>
                                                    {{ Form::text('from_limit_total_granted',null,['class'=>'form-control','placeholder'=>'Ej: 800000','required'=>'required']) }}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </fieldset>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-12">
                            <div class="well well-sm">
                                <fieldset>
                                    <legend>Propuesta esperada a recibir:</legend>
                                    <div class="row">
                                        <div class="col-xs-4">
                                            <div class="form-group">
                                                {{ Form::label('to_retribution_per_user_granted','Retribución por usuario:') }}
                                                <div class="input-group">
                                                    {{ Form::text('to_retribution_per_user_granted',null,['class'=>'form-control','placeholder'=>'Ej: 5','required'=>'required']) }}
                                                    <div class="input-group-addon">%</div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xs-4">
                                            <div class="form-group">
                                                {{ Form::label('to_limit_per_user_granted','Límite por usuario:') }}
                                                <div class="input-group">
                                                    <div class="input-group-addon">$</div>
                                                    {{ Form::text('to_limit_per_user_granted',null,['class'=>'form-control','placeholder'=>'Ej: 20000','required'=>'required']) }}
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xs-4">
                                            <div class="form-group">
                                                {{ Form::label('to_limit_total_granted','Límite total:') }}
                                                <div class="input-group">
                                                    <div class="input-group-addon">$</div>
                                                    {{ Form::text('to_limit_total_granted',null,['class'=>'form-control','placeholder'=>'Ej: 800000','required'=>'required']) }}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </fieldset>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-12">
                            <div class="form-group">
                                {{ Form::label('note','Notas adicionales:') }}
                                <textarea name="note" id="note" class="form-control" rows="3" placeholder="Me gustaría que fuéramos aliados porque..."></textarea>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                    {{ Form::button('Enviar',['id'=>'submit-form','class'=>'btn btn-primary']) }}
                </div>
            </div>
        {{ Form::close() }}
    </div>
</div>