  <div id="modal{{ $ven->id }}" class="modal">
          <div class="modal-content">
            <h5>Eliminar</h5>
            <br>
            <p>¿Deseas anular la compra?</p>
          </div>
          <div class="modal-footer">
            <a href="{{ route('venta.destroy', $ven->id) }}" class="modal-action modal-close waves-effect waves-red btn-flat ">Confirmar</a>
            <a href="#!" class="modal-action modal-close waves-effect waves-green btn-flat ">Cancelar</a>
          </div>
        </div>