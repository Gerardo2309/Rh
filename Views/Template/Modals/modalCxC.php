<!-- Modal -->
<div class="modal fade" id="modalformCxC" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header headerRegister">
        <h5 class="modal-title" id="titleModal">CxC</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      </div>
      <div class="modal-body">
        <div class="tile">
            <div class="tile-body">
              <form id="formCxC" name="formCxC">
                <div class="form-group">
                  <select class="js-data-example-ajax"  id="bustrab"  name="nombre">
                     <option value="">SELECCIONA UN TRABAJADOR</option>
                  </select>
                </div>
                <div class="form-group">
                  <label class="control-label">Monto</label>
                  <input class="form-control" id="intMonto" name="monto" type="number" min="0" placeholder="Cantidad de Dinero $$">
                </div>
                <div class="form-group">
                  <label class="control-label">Plazos</label>
                  <input class="form-control" id="txtPlazos" name="plazos" type="text" placeholder="Plazos a pagar">
                </div>
                <div class="form-group">
                  <label class="control-label">Tipo de CxC</label>
                  <select class="form-control"  id="sltipo"  name="tipo">
                     <option value="">SELECCIONA UN TIPO DE CXC</option>
                     <option value="ppersonal">PRESTAMO PERSONAL</option>
                     <option value="cimss">CONVENIO DE IMSS</option>
                  </select>
                </div>
                <div class="tile-footer">
                  <button id="btnActionForm" class="btn btn-primary" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i><span id="btnText">Guardar</span></button>
                    &nbsp;&nbsp;&nbsp;<a class="btn btn-secondary" href="#" data-dismiss="modal"><i class="fa fa-fw fa-lg fa-times-circle"></i>Cancelar</a>
                </div>
              </form>
            </div>
          </div>
      </div>
    </div>
  </div>
</div>