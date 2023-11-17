<!-- Modal -->
<div class="modal fade" id="modalformProteina" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header headerRegister">
        <h5 class="modal-title" id="titleModal"> </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      </div>
      <div class="modal-body">
        <div class="tile">
            <div class="tile-body">
              <form id="formProteina" name="formProteina">
                <input type="hidden" name="idproteina" id="idproteina" value="">
                <div class="form-group">
                  <label class="control-label">Nombre</label>
                  <input class="form-control" id="txtNombre" name="name" type="text" placeholder="Nombre de La Proteina">
                </div>
                <div class="form-group">
                  <label class="control-label">Cantidad</label>
                  <input class="form-control" id="nCantidad" name="cantidad" type="Number" placeholder="Cantidad">
                </div>
                <div class="form-group">
                  <label class="control-label">Unidad</label>
                  <select id="nUnidad" name="unidad" class="form-control">
                    <option selected>Selecciona</option>
                    <option value="Kg">Kg</option>
                    <option value="L">L</option>
                    <option value="Gr">Gr</option>
                    <option value="Pza">Pza</option>
                  </select>
                </div>
                <div class="form-group">
                  <label class="control-label">Precio</label>
                  <input class="form-control" id="nPrecio" name="precio" type="Number" placeholder="Precio">
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