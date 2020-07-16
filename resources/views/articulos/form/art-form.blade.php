  <div class="input-field col s12 l5 offset-l1">
          <i class="material-icons prefix ">line_style</i>
          {!!Form::text('codigo',null,['id'=>'codigo', 'data-error'=>'.errorTxt1','class'=>'validate'])!!}
          {!!Form::label('codigo','Codigo del producto:')!!}
          <div class="errorTxt1 red-text"></div>
    </div>


     <div class="input-field col s12 l5">
          <i class="material-icons prefix ">shopping_cart</i>
          {!!Form::text('nombre',null,['id'=>'nombre', 'data-error'=>'.errorTxt2','class'=>'validate'])!!}
          {!!Form::label('nombre','Nombre del producto:')!!}
          <div class="errorTxt2 red-text"></div>
    </div>

    <div class="clearfix"></div>
    

   <div class="input-field col s12 l5 offset-l1">
          <i class="material-icons prefix ">store</i>
          {!!Form::text('stock',null,['id'=>'existencias', 'data-error'=>'.errorTxt3','class'=>'validate'])!!}
          {!!Form::label('existencias','Existencias:')!!}
          <div class="errorTxt3 red-text"></div>
    </div>

     <div class="input-field col s12 l5">
        <i class="material-icons prefix">assignment_ind</i>
        {!!Form::select('categorias_id',$categoria,null,['class'=>'browser-default col s12 offset-s2','placeholder'=>'Eliga la categoria del articulo','data-error'=>'.errorTxt9'])!!} 
                          
        <div class="errorTxt9 red-text"></div>
                            
     </div>

      <div class="clearfix"></div>