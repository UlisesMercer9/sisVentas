  <div class="input-field col s12 l8 offset-l1">
          <i class="material-icons prefix ">person</i>
          {!!Form::text('nombre',null,['id'=>'nombre', 'data-error'=>'.errorTxt1','class'=>'validate'])!!}
          {!!Form::label('nombre','Categoría:')!!}
          <div class="errorTxt1 red-text"></div>
    </div>

   <div class="clearfix"></div>