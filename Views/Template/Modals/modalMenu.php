<!-- Modal -->
<div class="modal fade" id="modalformMenu" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header headerRegister">
        <h5 class="modal-title" id="titleModal">Nuevo Hotel</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      </div>
      <div class="modal-body">
        <div class="tile">
            <div class="tile-body">
              <form id="formMenu" name="formMenu">
                <input type="hidden" name="idmenu" id="idmenu" value="">
                <div class="form-group">
                  <label class="control-label">Nombre</label>
                  <input class="form-control" id="txtNombre" name="name" type="text" placeholder="Nombre del Hotel">
                </div>
                <div class="form-group">
                  <label class="control-label">Cantidad</label>
                  <input class="form-control" id="intCantidad" name="cantidad" type="number">
                </div>
                <div class="form-group">
                  <label class="control-label">Precio</label>
                  <input class="form-control" id="intPrecio" name="precio" type="number"></input>
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