    <div class="input-field col s5 offset-s1">
          <i class="material-icons prefix ">person</i>
          {!!Form::text('name',null,['id'=>'name', 'data-error'=>'.errorTxt1','class'=>'validate'])!!}
          {!!Form::label('name','Nombre:')!!}
          <div class="errorTxt1 red-text"></div>
    </div>


    <div class="input-field col s5">
          <i class="material-icons prefix ">email</i>
          {!!Form::email('email',null,['id'=>'email', 'data-error'=>'.errorTxt2','class'=>'validate'])!!}
          {!!Form::label('email','Email:')!!}
          <div class="errorTxt2 red-text"></div>
    </div>

    <div class="clearfix"></div>

    <div class="input-field col s5 offset-s1">
         <i class="material-icons prefix ">vpn_key</i>
         {!!Form::password('password',['id'=>'password', 'data-error'=>'.errorTxt3', 'class'=>'validate'])!!}
         {!!Form::label('Contraseña:')!!}
         <div class="errorTxt3 red-text"></div>

    </div>

      <div class="input-field col s5 ">
         <i class="material-icons prefix ">vpn_key</i>
         {!!Form::password('password2',['id'=>'password2', 'data-error'=>'.errorTxt4', 'class'=>'validate'])!!}
         {!!Form::label('Confirmar contraseña:')!!}
         <div class="errorTxt4 red-text"></div>
    </div>

    <div class="clearfix"></div>