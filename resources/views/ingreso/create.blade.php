@extends('layouts.admin')

@section('content')

 
  <!--Contenedor principal-->
<div class="row ">

  <br><br>

  <nav class="col s12 m12 l6 #ffffff white no-border">
    <div class="nav-wrapper #01579b light-blue darken-4  z-depth-2">
      <div class="col s12">
        <a href="{!!URL::to('/ingreso')!!}" class="breadcrumb">&nbsp; Inicio</a>
        <a href="#!" class="breadcrumb">Nuevo Ingreso</a>
        
      </div>
    </div>
   </nav>
  
   
   <div class="clearfix"></div>
   <br><br>

    <!--Inicio del formulario para crear administrador-->
          <div class="row">
            <div class="col s12 l12">
              <div class="card z-depth-3">
                
            {!!Form::open(['route'=>'ingreso.store','method'=>'POST','id'=>'IngreCreateForm','name'=>'IngreCreateForm'])!!}
                    <div class="card-tittle #01579b light-blue darken-4  ">
                  <h5 class="white-text form-title">&nbsp;&nbsp;<i class=""></i>&nbsp; <br></h5>             
                    </div>
                  
                  
                <div class="card-stacked">
                   <div class="row">
                      <div class="card-content">
                         @include('ingreso.form.ingre-form')

                         <br>
                         
                          <div class="card-panel #eceff1 blue-grey lighten-5 z-depth-3 col s12 l12">
                          <br>
                          <br>
                                     
                              
                             <label for="particulo_id" class="input-field col s12 l3 blue-grey-text"> Articulo
                                    
                                     {!!Form::select('particulo_id',$articulos,null,['id'=>'particulo_id','class'=>'col s11 l12 offset-l1','placeholder'=>'Elija un articulo','data-error'=>'.errorTxt5'])!!}

                                     <div class="errorTxt5 red-text"></div>
                            
                             </label>

                         

                             <div class="input-field col s12 l2 offset-l1">
                                    <i class="material-icons prefix ">local_grocery_store</i>
                                    {!!Form::text('pcantidad',null,['placeholder'=>'','id'=>'pcantidad', 'data-error'=>'.errorTxt6','class'=>'validate'])!!}
                                    {!!Form::label('pcantidad','Cantidad:')!!}
                                    <div class="errorTxt6 red-text"></div>
                            </div>

                            <div class="input-field col s12 l2">
                                    <i class="material-icons prefix "><i class="material-icons">attach_money</i></i>
                                    {!!Form::number('pprecio_compra',null,['placeholder'=>'','id'=>'pprecio_compra', 'data-error'=>'.errorTxt7','class'=>'validate'])!!}
                                    {!!Form::label('pprecio_compra','P Compra:')!!}
                                    <div class="errorTxt7 red-text"></div>
                            </div>

                            <div class="input-field col s12 l2">
                                    <i class="material-icons prefix "><i class="material-icons">attach_money</i></i>
                                    {!!Form::number('pprecio_venta',null,['placeholder'=>'','id'=>'pprecio_venta', 'data-error'=>'.errorTxt8','class'=>'validate'])!!}
                                    {!!Form::label('pprecio_venta','P Venta:')!!}
                                    <div class="errorTxt8 red-text"></div>
                            </div>

                            <div class="input-field col s12 l2">
                                <button type="button" id="bt_add" class="waves-effect waves-light btn blue">Agregar</button>
                            </div>
                           
                            <div class="clearfix"></div>
                             <br>
                             <br>
                          
                        
                                <table id="detalles" class="highlight centered">
                                    <thead class="#b2dfdb teal lighten-4">
                                     
                                          <th>Opciones</th>
                                          <th>Articulo</th>
                                          <th>Cantidad</th>
                                          <th>Precio Compra</th>
                                          <th>Precio Venta</th>
                                          <th>Sub total</th>
                                     
                                    </thead>

                                    <tfoot>
                                        <td>TOTAL</td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td><h5 id="total">0.00</h5></td>

                                    </tfoot>
                                    <tbody>
                                      
                                    </tbody>
                                  </table>

                          </div>
                      </div>
                    

                  </div>

                    <div class="card-action" id="guardar">
                      <button class="waves-effect waves-light btn" type="submit"><i class="material-icons left">check</i>Guardar</button>

                      <button class="waves-effect waves-light btn red" type="reset"><i class="material-icons left">clear</i>Cancelar</button>
                    </div>
                         

                         
                 </div> 
                     
     
                 
                    {!!Form::close()!!}
                </div> 
              </div>         
          </div> 
      <!--FIN DEL FORMULARIO-->        
           

  </div>
  <!--Fin Contenedor principal-->
   
 
 <!--Margen en blanco-->
 <div id="spacer">
   
 </div>
 <!--Margen en blanco-->

 


@push('scripts')
   <script>
      
      $(document).ready(function(){
        $('#bt_add').click(function(){
          agregar();
        });
      });
      
      var cont=0;
      total = 0;
      subtotal=[];
      $("#guardar").hide();

      function agregar(){
        articulo_id = $("#particulo_id").val();
        articulo = $("#particulo_id option:selected").text();
        cantidad = $("#pcantidad").val();
        precio_compra = $("#pprecio_compra").val();
        precio_venta = $("#pprecio_venta").val();

        if(articulo_id != "" && cantidad != "" && cantidad > 0 && precio_compra !="" && precio_venta !="")
        {
          subtotal[cont] = (cantidad*precio_compra);
          total= total + subtotal[cont];

          var fila = '<tr id="fila'+cont+'"> <td><button class="waves-effect waves-light btn-floating amber"><i class="material-icons left">clear</i></button></td> <td><input type="hidden" name="articulo_id[]" value="'+articulo_id+'">'+articulo+'</td>  <td> <input type="number" name="cantidad[]" value="'+cantidad+'"> </td>  <td>  <input type="number" name="precio_compra[]" value="'+precio_compra+'"> </td>  <td><input type="number" name="precio_venta[]" value="'+precio_venta+'"></td> <td>'+subtotal[cont]+'</td></tr>';
          cont++;
          limpiar();
          $("#total").html(total);
          evaluar();
          $('#detalles').append(fila);

        }else{
          alert("Error al ingresar el detalle del ingreso, revise los datos del articulo");
        }
onclick="eliminar('+cont+')"
      }

      function limpiar(){
        $("#pcantidad").val("");
        $("#pprecio_compra").val("");
        $("#pprecio_venta").val("");
      }

      function evaluar()
      {
        if (total>0)
        {
          $("#guardar").show();
        }
        else
         {
          $("#guardar").hide();
         } 
      }

      function eliminar(index){
        total = total-subtotal[index];
        $("#total").html("$/." + total);
        $("#fila" + index).remove();
        evaluar();
      }


   </script>
@endpush

@endsection