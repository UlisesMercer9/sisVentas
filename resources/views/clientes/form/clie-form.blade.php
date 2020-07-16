  <div class="input-field col s12 l5 offset-l1">
          <i class="material-icons prefix ">person</i>
          {!!Form::text('nombre',null,['id'=>'nombre', 'data-error'=>'.errorTxt1','class'=>'validate'])!!}
          {!!Form::label('nombre','Nombre del Cliente:')!!}
          <div class="errorTxt1 red-text"></div>
    </div>


     <div class="input-field col s12 l5">
          <i class="material-icons prefix ">phone</i>
          {!!Form::text('telefono',null,['id'=>'telefono', 'data-error'=>'.errorTxt2','class'=>'validate'])!!}
          {!!Form::label('telefono','No. Telefonico:')!!}
          <div class="errorTxt2 red-text"></div>
    </div>

    <div class="clearfix"></div>

     <div class="input-field col s12 l5 offset-l1">
          <i class="material-icons prefix ">add_location</i>
          {!!Form::text('direccion',null,['id'=>'direccion', 'data-error'=>'.errorTxt3','class'=>'validate'])!!}
          {!!Form::label('direccion','Direccion:')!!}
          <div class="errorTxt3 red-text"></div>
    </div>


     <div class="input-field col s12 l5">
             <i class="material-icons prefix ">email</i>
          {!!Form::email('email',null,['id'=>'email', 'data-error'=>'.errorTxt4','class'=>'validate'])!!}
          {!!Form::label('email','Email:')!!}
          <div class="errorTxt4 red-text"></div>
    </div>

    <div class="clearfix"></div>