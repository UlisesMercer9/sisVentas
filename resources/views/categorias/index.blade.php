@extends('layouts.admin')
 
         
@section('content')

    <br><br>

  

  <div class="row ">

  <nav class="col s12 m12 l4 #ffffff white no-border">
    <div class="nav-wrapper #01579b light-blue darken-4  z-depth-3 hoverable">
      <div class="col s12">
        <a href="{!!URL::to('/categorias')!!}" class="breadcrumb">&nbsp; Categorías</a>
        
      </div>
    </div>
   </nav>

    
   {!!Form::open(['url'=>'categorias','method'=>'GET','autocomplete'=>'off','role'=>'search'])!!}  
   <nav class=" col s12 m12 offset-l2 l4 #ffffff white no-border">
    <div class="nav-wrapper #ffffff white z-depth-3 hoverable">
      <div class="input-field  col s12 l12">
      {!!Form::text('searchText',null,['id'=>'search','class'=>'label-icon black-text','placeholder' => 'Buscar categoría'])!!}
      
      </div>     
   </div>    
   </nav>

    <nav class="col s12 m12 l1  #ffffff white no-border ">
      
      {!!Form::button('<i class="material-icons">search</i> ', array('class'=>'hoverable waves-effect waves-light btn-large #01579b light-blue darken-4 z-depth-3','type'=>'submit','id'=>'submit')) !!}  
    </nav>
   {!!Form::close()!!}  

    <div class="clearfix"></div>

   <br>
   
   <nav class="col s2 m12 l1  #ffffff white no-border ">
        <a href="{{url('reportecategorias')}}"  target="blank" class="waves-effect waves-light btn-large amber">Reportes</a>
      
   </nav>

   </div>

   <br><br> 

   @include('alerts.success')
     
     <div class="row">
           
          <div class=" col l10 s12 offset-l1">


            <!--Tabla y sus contenidos--> 
                  <table class="highlight centered responsive-table">
                      <thead>
                        <tr>
                            <th data-field="Id">ID</th>
                            <th data-field="nombre">Nombre de la Categoría</th>
                            <th data-field="nombre">Opciones</th>
                        </tr>
                      </thead>

                      <tbody>

                        <!--Ciclo para recorrer los datos de la consulta a la base de datos e imnprimimirlos-->
                        @foreach($categorias as $categoria)

                        <tr>
                          <td>{{ $categoria->id }}</td>
                          <td>{{ $categoria->nombre }}</td>
                          <td>
                          <a href="{{ route('categorias.edit', $categoria->id) }}" class="btn tooltipped amber" data-position="right" data-delay="50" data-tooltip="Actualizar categoria">
                            <i class="material-icons">edit</i>
                          </a>
                          <a href="#modal{{ $categoria->id }}" class="btn tooltipped red" data-position="right" data-delay="50" data-tooltip="Eliminar categoria">
                            <i class="material-icons">delete</i>
                          </a>
                          </td>
                        </tr>
                         @include('categorias.form.modal')
                        @endforeach


                     
                        <!--Fin ciclo-->

                      </tbody>
                    </table>

          </div> 

      
     <div class="clearfix"></div>

     <br><br><br><br>

     <div >
       
         <center>{!! $categorias->render() !!}</center>
     </div>

  </div>


       <div class="fixed-action-btn horizontal click-to-toggle " style="bottom: 45px; right: 24px;">
              <a class="btn-floating btn-large teal z-depth-3 btn tooltipped waves-effect waves-light" data-position="left" data-delay="50" data-tooltip="Agregar nueva categoria" href="{!!URL::to('/categorias/create')!!}" >
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