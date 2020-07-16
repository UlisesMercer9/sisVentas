@extends('layouts.admin')

@section('content')

 
  <!--Contenedor principal-->
<div class="row container">

  <br><br>

  <nav class="col s12 m12 l5 #ffffff white no-border">
    <div class="nav-wrapper #01579b light-blue darken-4  z-depth-2">
      <div class="col s12">
        <a href="{!!URL::to('/admin')!!}" class="breadcrumb">&nbsp; Inicio</a>
        <a href="#!" class="breadcrumb">Nuevo</a>
        
      </div>
    </div>
   </nav>
  
   
   <div class="clearfix"></div>
   <br><br>

    <!--Inicio del formulario para crear administrador-->
          <div class="col s12">
              <div class="card z-depth-3">
                
                {!!Form::open(['route'=>'admin.store','method'=>'POST','id'=>'AdminCreateForm','name'=>'AdminCreateForm','files'=>true])!!}
                    <div class="card-tittle #01579b light-blue darken-4  ">
                  <h5 class="white-text form-title">&nbsp;&nbsp;<i class=""></i>&nbsp; <br></h5>             
                    </div>
                  
                  
                <div class="card-stacked">
                   <div class="row">
                      <div class="card-content">
                        @include('admin.form.usr')
                      </div>
                      <br><br>

                  </div>
                    
                         {!!Form::button('<i class="material-icons">send</i> ', array('class'=>'btn-floating btn-large halfway-fab waves-effect waves-ligh','type'=>'submit','id'=>'submit')) !!}  
                 </div> 
                     
     
                 
                    {!!Form::close()!!}
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
