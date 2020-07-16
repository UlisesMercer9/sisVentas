<div class="input-field col s12 l5">
        <i class="material-icons prefix">assignment_ind</i>          
        <input  id="proveedor" type="text" class="validate" value="{{ $venta->nombre }}">
        <label for="proveedor">Cliente</label>   
</div>

<div class="input-field col s12 l5 offset-l1">
         <i class="material-icons prefix ">book</i>
         <input  id="tipo_comprobante" type="text" class="validate" value="{{ $venta->tipo_comprobante }}">
         <label for="tipo_comprobante">Tipo comprobante</label>
</div>

<div class="clearfix"></div>



<div class="input-field col s12 l5">
         <i class="material-icons prefix ">assignment</i>
         <input  id="serie_comprobante" type="text" class="validate" value="{{ $venta->serie_comprobante }}">
         <label for="serie_comprobante"></label>
 </div>

 <div class="input-field col s12 l5 offset-l1">
         <i class="material-icons prefix ">assignment</i>
         <input  id="num_comprobante" type="text" class="validate" value="{{ $venta->num_comprobante }}">
         <label for="num_comprobante"></label>
 </div>


<div class="clearfix"></div>