<!-- Modal -->
<div class="modal fade" id="modalSolicitudesa" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header headerRegister">
        <h5 class="modal-title" id="titleModal">Modal title</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="tile">
          <div class="tile-body">
            <form id="formSubirsa" name="formSubirsa">

              <div class="form-group">
                <input type="hidden" class="form-control" name="idtrabajador" id="idtrabajador">
                <div class="select-style-1">
                  <label>Sucursal</label>
                  <div class="select-position">
                    <select class="form-control" name="txtSucursal" id="txtSucursal" >
                      <option value="">Selecciona una Sucursal</option>
                      <option value="JW MARRIOT">JW Marriort</option>
                      <option value="EMPORIO">Emporio</option>
                      <option value="WESTIN">Westin</option>
                      <option value="PRESIDENTE">Presidente</option>
                      <option value="MEXICO MAGICO">Mexico Magico</option>
                    </select>
                  </div>
                </div>
                <div class="row">
                  <div class="col-sm-6">
                    <div class="input-style-1">
                      <label>Contrato</label>
                      <input type="file" accept=".doc, .docx,.pdf" class="form-control" name="txtContrato" id="txtContrato">
                    </div>
                  </div>
                  <div class="col-sm-6">
                    <div class="input-style-1">
                      <label>Acta de nacimiento</label>
                      <input type="file" accept=".doc, .docx,.pdf" class="form-control" name="txtActNa" id="txtActNa">
                    </div>
                  </div>
                  <div class="col-sm-6">
                    <div class="input-style-1">
                      <label>Curp</label>
                      <input type="file" accept=".doc, .docx,.pdf" class="form-control" name="txtCurp" id="txtCurp">
                    </div>
                  </div>
                  <div class="col-sm-6">
                    <div class="input-style-1">
                      <label>RFC</label>
                      <input type="file" accept=".doc, .docx,.pdf" class="form-control" name="txtRFC" id="txtRFC">
                    </div>
                  </div>
                  <div class="col-sm-6">
                    <div class="input-style-1">
                      <label>Foto</label>
                      <input type="file" accept="image/png,image/jpeg" class="form-control" name="txtFoto" id="txtFoto">
                    </div>
                  </div>
                </div>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" id="btnActionForm" class="btn btn-primary"><span id="btnText">Guardar</span></button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>