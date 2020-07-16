  <div id="modal{{ $user->id }}" class="modal">
          <div class="modal-content">
            <h5>Eliminar</h5>
            <br>
            <p>¿Deseas eliminar el administrador {{ $user->name }}?</p>
          </div>
          <div class="modal-footer">
            <a href="{{ route('admin.destroy', $user->id) }}" class="modal-action modal-close waves-effect waves-red btn-flat ">Confirmar</a>
            <a href="#!" class="modal-action modal-close waves-effect waves-green btn-flat ">Cancelar</a>
          </div>
        </div>