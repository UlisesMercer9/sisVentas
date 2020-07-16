@extends('layouts.admin')
 
         
@section('content')



    <br><br>

  


  <div class="row ">

  <nav class="col s12 m12 l4 #ffffff white no-border">
    <div class="nav-wrapper #01579b light-blue darken-4   z-depth-3">
      <div class="col s12">
        <a href="{!!URL::to('/admin')!!}" class="breadcrumb">&nbsp; Inicio</a>
        
      </div>
    </div>
   </nav>

   </div>

   <br><br>
     
     @include('alerts.success')


  <div class="row">
    @foreach ($users as $user)
        <div class="col s12 m6 l4">
          <div class="card teal z-depth-3 hoverable">
            <div class="card-content white-text">
              <h5>{{ $user->name }}</h5>
              <p>{{ $user->email }}</p>
            </div>
            <div class="card-action">
              <a href="#modal{{ $user->id }}" class="white-text fa fa-trash-o fa-2x tooltipped" data-position="right" data-delay="50" data-tooltip="Eliminar Administrador"></a>
            </div>
          </div>
        </div>
     
       @include('admin.form.modal')
     @endforeach

  </div>


       <div class="fixed-action-btn horizontal click-to-toggle " style="bottom: 45px; right: 24px;">
              <a class="btn-floating btn-large teal z-depth-3 btn tooltipped waves-effect waves-light" data-position="left" data-delay="50" data-tooltip="Agregar nuevo Administrador" href="{!!URL::to('/admin/create')!!}" >
                <i class="material-icons">person_add</i>
              </a>
            </div>
            <!--button fixed--> 

         

      <!--Margen en blanco-->
 <br>
 <br>
 <br>
 <br>
 <br>
 <br>
 <br>
 
 <br>

 <!--Margen en blanco-->



@endsection