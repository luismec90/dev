<div class="modal fade" id="modal-request-alliance" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        {{ Form::open(["id"=>"form-request-alliance","route"=>$route,'novalidate'=>true]) }}
        {{ Form::hidden('to',null,['id'=>'to','required'=>'required','novalidate'=>true]) }}
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Cerrar</span></button>
                <h4 class="modal-title" id="modal-request-alliance-label">{{ $title }} <span id="shop-name" class="text-danger"></span></h4>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-xs-12">
                        <div class="well well-sm">
                            <fieldset>
                                <legend>Propuesta a enviar:</legend>
                                @if(!isset($allianceRecord) || $allianceRecord->alliance->from==$shop->id)
                                    @include('shops.pages.admin.alliances.partials.inputs_from')
                                @else
                                    @include('shops.pages.admin.alliances.partials.inputs_to')
                                @endif
                            </fieldset>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-12">
                        <div class="well well-sm">
                            <fieldset>
                                <legend>Propuesta esperada a recibir:</legend>
                                @if(!isset($allianceRecord) || $allianceRecord->alliance->from==$shop->id)
                                    @include('shops.pages.admin.alliances.partials.inputs_to')
                                @else
                                    @include('shops.pages.admin.alliances.partials.inputs_from')
                                @endif
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