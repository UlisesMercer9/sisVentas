@extends('layouts.admin')

@section('content')

 
  <!--Contenedor principal-->
<div class="row ">

  <br><br>

  <nav class="col s12 m12 l6 #ffffff white no-border">
    <div class="nav-wrapper #01579b light-blue darken-4  z-depth-2">
      <div class="col s12">
        <a href="{!!URL::to('/ingreso')!!}" class="breadcrumb">&nbsp; Inicio</a>
        <a href="#!" class="breadcrumb">Detalles Ingreso</a>
        
      </div>
    </div>
   </nav>
  
   
   <div class="clearfix"></div>
   <br><br>

    <!--Inicio del formulario para crear administrador-->
          <div class="row">
            <div class="col s12 l12">
              <div class="card z-depth-3">
                
         
            <div class="card-tittle #01579b light-blue darken-4  ">
                  <h5 class="white-text form-title">&nbsp;&nbsp;<i class=""></i>&nbsp; <br></h5>             
                    </div>
                  
                  
                <div class="card-stacked">
                   <div class="row">
                      <div class="card-content">
                         @include('ingreso.form.deta-form')

                         <br>
                         
                          <div class="card-panel #eceff1 blue-grey lighten-5 z-depth-3 col s12 l12">
                            <br>
                          
                        
                                <table id="detalles" class="highlight centered">
                                    <thead class="#b2dfdb teal lighten-4">
                                    
                                          <th>Articulo</th>
                                          <th>Cantidad</th>
                                          <th>Precio Compra</th>
                                          <th>Precio Venta</th>
                                          <th>Sub total</th>
                                     
                                    </thead>

                                    <tfoot>
                                       
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td><h5 id="total">{{ $ingreso->total }}</h5></td>

                                    </tfoot>
                                    <tbody>
                                       @foreach($detalles as $det)
                                       <tr>
                                         <td>{{ $det->articulo }}</td>
                                         <td>{{ $det->cantidad }}</td>
                                         <td>{{ $det->precio_compra }}</td>
                                         <td>{{ $det->precio_venta }}</td>
                                         <td>{{ $det->cantidad * $det->precio_compra }}</td>
                                       </tr>
                                       @endforeach
                                    </tbody>
                                  </table>

                          </div>
                      </div>
                    

                  </div>

                         

                         
                 </div> 
                     
     
                 
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

 




@endsection