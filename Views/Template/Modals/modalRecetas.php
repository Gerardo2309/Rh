<!-- Modal -->
<div class="modal fade" id="modalformRecetas" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header headerRegister">
        <h5 class="modal-title" id="titleModal">Nueva Receta</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      </div>
      <div class="modal-body">
        <div class="tile">
            <div class="tile-body">
              <form id="formRecetas" name="formRecetas">
                <input type="hidden" name="idrecetas" id="idrecetas" value="">
                <div class="form-group">
                  <select class="js-example-basic-single"  id="buscarplato"  name="plato">
                  </select>
                </div>
                <div class="form-group">
                  <select class="js-example-basic-single"  id="buscaproducto"  name="producto">
                  </select>
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