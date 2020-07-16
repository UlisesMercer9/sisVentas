@extends('layouts.admin')
 
         
@section('content')

    <br><br>

  

  <div class="row ">

  <nav class="col s12 m12 l4 #ffffff white no-border">
    <div class="nav-wrapper #01579b light-blue darken-4  z-depth-3 hoverable">
      <div class="col s12">
        <a href="{!!URL::to('/proveedores')!!}" class="breadcrumb">&nbsp; Proveedores</a>
        
      </div>
    </div>
   </nav>

    
   {!!Form::open(['url'=>'articulos','method'=>'GET','autocomplete'=>'off','role'=>'search'])!!}  
   <nav class=" col s9 m12 offset-l2 l4 #ffffff white no-border">
    <div class="nav-wrapper #ffffff white z-depth-3 hoverable">
      <div class="input-field  col s12 l12">
      {!!Form::text('searchText',null,['id'=>'search','class'=>'label-icon black-text','placeholder' => 'Buscar Proveedor'])!!}
      
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
        <a href="{{url('reporteproveedores')}}" target="blank" class="waves-effect waves-light btn-large amber">Reportes</a>
      
      </nav>  

   </div>

   <br><br> <br>

    @include('alerts.success')
     
     <div class="row">
          
      @foreach ($personas as $persona)
        <div class="col s12 m6 l4">
          <div class="card teal z-depth-3 hoverable">
            <div class="card-content white-text">
              <h5>{{ $persona->nombre }}</h5>
              <p>Email: {{ $persona->email }}</p>
              <br>
              <p>Telefono: {{ $persona->telefono }}</p>
              
            </div>
            <div class="card-action">
              {!!link_to_route('proveedores.edit', $title = '', $parameters = $persona->id, $attributes = ['class'=>'white-text fa fa-pencil fa-2x tooltipped', 'data-position'=>'left','data-delay'=>'50', 'data-tooltip'=>'Editar proveedor'])!!} &nbsp;&nbsp;

              <a href="#modal{{ $persona->id }}" class="white-text fa fa-trash-o fa-2x tooltipped" data-position="right" data-delay="50" data-tooltip="Eliminar proveedor">
                            
              </a>
            </div>
          </div>
        </div>
     
      @include('proveedores.form.modal')
     @endforeach 
          

      
     <div class="clearfix"></div>

     <br><br>

     <div >
       
         <center>{!! $personas->render() !!}</center>
     </div>

  </div>


       <div class="fixed-action-btn horizontal click-to-toggle " style="bottom: 45px; right: 24px;">
              <a class="btn-floating btn-large teal z-depth-3 btn tooltipped waves-effect waves-light" data-position="left" data-delay="50" data-tooltip="Agregar nuevo proveedor" href="{!!URL::to('/proveedores/create')!!}" >
                <i class="material-icons">person_add</i>
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