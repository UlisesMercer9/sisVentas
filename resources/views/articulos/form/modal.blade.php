  <div id="modal{{ $articulo->id }}" class="modal">
          <div class="modal-content">
            <h5>Eliminar</h5>
            <br>
            <p>¿Deseas eliminar el articulo {{ $articulo->nombre }}?</p>
          </div>
          <div class="modal-footer">
            <a href="{{ route('articulos.destroy', $articulo->id) }}" class="modal-action modal-close waves-effect waves-red btn-flat ">Confirmar</a>
            <a href="#!" class="modal-action modal-close waves-effect waves-green btn-flat ">Cancelar</a>
          </div>
        </div>