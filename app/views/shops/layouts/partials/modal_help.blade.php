<!-- Modal -->
<div class="modal fade" id="modal-help" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
     {{ Form::open(['route'=>['request_call_path',$shop->link],'id'=>'form-help']) }}
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <h4 class="modal-title" id="myModalLabel">Soporte</h4>
      </div>
      <div id="body-modal-info-user" class="modal-body">
        <div class="row">
            <div class="col-xs-12">
                <h4>¿Desea recibir asistencia en la configuración de su establecimiento, o simplemente tiene alguna inquietud?  </h4>
                  En caso afirmativo por favor ingrese su nombre y su número celular, nos comunicaremos con usted inmediatamente.
                <hr>

                    <!--  Form Input -->
                    <div class="form-group">
                        {{ Form::label('name_help','Nombre completo:') }}
                        {{ Form::text('name_help',null,['class'=>'form-control','required'=>true]) }}
                    </div>

                    <!--  Form Input -->
                    <div class="form-group">
                        {{ Form::label('cell_help','Celular:') }}
                        {{ Form::text('cell_help',null,['class'=>'form-control','required'=>true]) }}
                    </div>

            </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
         {{ Form::button('Enviar',['id'=>'btn-form-help','class'=>'btn btn-primary']) }}
      </div>
    </div>
    {{ Form::close() }}
  </div>
</div>