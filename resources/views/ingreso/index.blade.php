@extends('layouts.admin')
 
         
@section('content')

    <br><br>

  

  <div class="row ">

  <nav class="col s12 m12 l4 #ffffff white no-border">
    <div class="nav-wrapper #01579b light-blue darken-4  z-depth-3 hoverable">
      <div class="col s12">
        <a href="{!!URL::to('/ingreso')!!}" class="breadcrumb">&nbsp; Ingreso</a>
        
      </div>
    </div>
   </nav>

    
   {!!Form::open(['url'=>'articulos','method'=>'GET','autocomplete'=>'off','role'=>'search'])!!}  
   <nav class=" col s9 m12 offset-l2 l4 #ffffff white no-border">
    <div class="nav-wrapper #ffffff white z-depth-3 hoverable">
      <div class="input-field  col s12 l12">
      {!!Form::text('searchText',null,['id'=>'search','class'=>'label-icon black-text','placeholder' => 'Buscar Ingreso'])!!}
      
      </div>     
   </div>    
   </nav>

    <nav class="col s2 m12 l1  #ffffff white no-border ">
      
      {!!Form::button('<i class="material-icons">search</i> ', array('class'=>'hoverable waves-effect waves-light btn-large #01579b light-blue darken-4 z-depth-3','type'=>'submit','id'=>'submit')) !!}  
    </nav>
   {!!Form::close()!!} 

   <div class="clearfix"></div>

   <br>

   <nav class="col s2 m12 l1  #ffffff white no-border ">
        <a  href="{{url('reporteingresos')}}" target="blank" class="waves-effect waves-light btn-large amber">Reportes</a>
      
      </nav>   

   </div>

   <br><br> <br>

    @include('alerts.success')
     
     <div class="row">
          <div class=" col l12 s12  offset-s2">


            <!--Tabla y sus contenidos--> 
                  <table class="highlight centered responsive-table">
                      <thead>
                        <tr>
                            <th>Fecha</th>
                            <th>Proveedor</th>
                            <th>Comprobante</th>
                            <th>Total</th>
                            <th>Estado</th>
                            <th>Opciones</th>
                        </tr>
                      </thead>

                      <tbody>

                        <!--Ciclo para recorrer los datos de la consulta a la base de datos e imnprimimirlos-->
                        @foreach($ingresos as $ingreso)

                        <tr>
                          <td>{{ $ingreso->fecha_hora }}</td>
                          <td>{{ $ingreso->nombre }}</td>
                          <td>{{ $ingreso->tipo_comprobante.': '.$ingreso->serie_comprobante.'-'.$ingreso->num_comprobante }}</td>
                          <td>{{ $ingreso->total }}</td>
                          <td>{{ $ingreso->estado }}</td>
                          <td><a href="{{ route('ingreso.show', $ingreso->id) }}" class="btn tooltipped cyan" data-position="button" data-delay="50" data-tooltip="Detalles de la compra">
                            <i class="material-icons">book</i>
                          </a>

                          <a  href="{{URL::action('IngresoController@reportec',$ingreso->id)}}" target="blank" class="btn tooltipped amber" data-position="button" data-delay="50" data-tooltip="Reporte de la compra">
                            <i class="material-icons">assignment</i>
                          </a>
                          

                          <a href="#modal{{ $ingreso->id }}" class="btn tooltipped red" data-position="button" data-delay="50" data-tooltip="Anular Compra">
                            <i class="material-icons">delete</i></td>
                        </tr>
                         @include('ingreso.form.modal')
                        @endforeach


                     
                        <!--Fin ciclo-->

                      </tbody>
                    </table>

          </div> 
     
          

      
     <div class="clearfix"></div>

     <br><br>

     <div >
       
         <center>{!! $ingresos->render() !!}</center>
     </div>

  </div>


       <div class="fixed-action-btn horizontal click-to-toggle " style="bottom: 45px; right: 24px;">
              <a class="btn-floating btn-large teal z-depth-3 btn tooltipped waves-effect waves-light" data-position="left" data-delay="50" data-tooltip="Agregar nueva compra" href="{!!URL::to('/ingreso/create')!!}" >
                <i class="material-icons">add</i>
              </a>
            </div>
            <!--button fixed--> 

   <div class="clearfix"></div>         

      <!--Margen en blanco-->
 <br>
 <br>
 <br>
 <br>


 <!--Margen en blanco-->

@endsection