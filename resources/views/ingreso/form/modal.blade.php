  <div id="modal{{ $ingreso->id }}" class="modal">
          <div class="modal-content">
            <h5>Eliminar</h5>
            <br>
            <p>¿Deseas anular la venta?</p>
          </div>
          <div class="modal-footer">
            <a href="{{ route('ingreso.destroy',$ingreso->id) }}" class="modal-action modal-close waves-effect waves-red btn-flat ">Confirmar</a>
            <a href="#!" class="modal-action modal-close waves-effect waves-green btn-flat ">Cancelar</a>
          </div>
        </div>