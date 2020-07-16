

  <label for="proveedor_id" class="input-field col s12 l5 blue-grey-text"> Proveedor
        
        {!!Form::select('proveedor_id',$personas,null,['class'=>'browser-default col s12 offset-s1 l12 offset-l2','placeholder'=>'Elija un proveedor','id'=>'proveedor_id','data-error'=>'.errorTxt1'])!!} 
                          
        <div class="errorTxt1 red-text"></div>                            
                                
 </label>

 

<div class="input-field col s12 l5 offset-l1">
         <i class="material-icons prefix ">book</i>
         {!! Form::select('tipo_comprobante', ['Boleta' => 'Boleta', 'Factura' => 'Factura','Ticket' => 'Ticket'],null,['class' => 'browser-default col s10 offset-s1 l12 offset-l2', 'placeholder' => 'Elija un tipo de comprobante','data-error'=>'.errorTxt2']) !!}
         <div class="errorTxt2 red-text"></div>
</div>
<br><br><br>
<br>
<br>

<div class="clearfix"></div>



<div class="input-field col s12 l6">
         <i class="material-icons prefix ">assignment</i>
         {!!Form::text('serie_comprobante',null,['id'=>'serie_comprobante', 'data-error'=>'.errorTxt3','class'=>'validate'])!!}
         {!!Form::label('serie_comprobante','Serie del comprobante:')!!}
         <div class="errorTxt3 red-text"></div>
 </div>

 <div class="input-field col s12 l6">
         <i class="material-icons prefix "><i class="material-icons">filter_1</i></i>
         {!!Form::text('num_comprobante',null,['id'=>'num_comprobante', 'data-error'=>'.errorTxt4','class'=>'validate'])!!}
         {!!Form::label('num_comprobante','Numero del comprobante:')!!}
         <div class="errorTxt4 red-text"></div>
 </div>


<div class="clearfix"></div>