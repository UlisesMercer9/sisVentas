<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<title>Dulceria El Profe</title>
	{!! Html::style('/bower_components/materialize/dist/css/materialize.min.css') !!}
  {!! Html::style('/css/font-awesome.min.css') !!}
	{!! Html::style('/css/app.css') !!}
  {!! Html::style('/css/select2.min.css') !!}
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

</head>
<body>

    <header>
    <div class="navbar-fixed">
        <nav class="banner">
           <div class="nav-wrapper #01579b light-blue darken-4 "> 


             <a href="#" data-activates="mobil" class="button-collapse"><i class="material-icons">menu</i></a>
               <ul class="right hide-on-med-and-down">
         
              <li><a class="dropdown-button" href="#!" data-activates="dropdown1"><i class="material-icons right">arrow_drop_down</i></a></li>
           
             </ul>
           </div>
       </nav>
     </div>
                   <!--MENU DISPOSITIVO MOVIL-->  

    <ul class="side-nav  blue-grey darken-4 row" id="mobil">

      
                      <div id="blank-space"></div>
                       <div class="truncate"></div>
                       <div class="space">
                          <div class="col s3">
                            
                          </div>
                          <div class="col s9 ">
                            <p class="left-align white-text name-text hide-on-med-and-down"></p>   
                         </div>       
                       </div>

                       <div class="truncate margin hide-on-med-and-up"></div>
      

                       <div class="card-panel #000000 black z-depth-2">
                           <span class="grey-text">MENÚ</span>
                       </div>

                       <ul class="collapsible" data-collapsible="accordion">
                          <li class="opcion">
                               <a class="collapsible-header  white-text waves-effect waves-light">
                                  <i class="fa fa-briefcase white-text"></i>
                                    Almacén
                               </a>
                                <div class="collapsible-body">
                                 <ul>
                                   <li class="blue-grey darken-4">
                                     <a href="{!!URL::to('/categorias')!!}" class="white-text waves-effect waves-light">
                                     <i class="fa fa-book white-text"></i>
                                     Categorías
                                     </a>
                                   </li>
                                   <li class="blue-grey darken-4">
                                      <a href="{!!URL::to('/articulos')!!}" class="white-text waves-effect waves-light">
                                      <i class="fa fa-shopping-basket white-text"></i>
                                       Artículos
                                      </a>
                                  </li>
                  
                                 </ul>
                               </div>
                          </li>
                       </ul>

                       <ul class="collapsible" data-collapsible="accordion">
                          <li class="opcion">
                               <a class="collapsible-header  white-text waves-effect waves-light">
                                  <i class="fa fa-shopping-bag white-text"></i>
                                    Compras
                               </a>
                                <div class="collapsible-body">
                                 <ul>
                                   <li class="blue-grey darken-4">
                                     <a href="" class="white-text waves-effect waves-light">
                                     <i class="material-icons white-text">library_books</i>
                                     Ingreso
                                     </a>
                                   </li>
                                   <li class="blue-grey darken-4">
                                      <a href="" class="white-text waves-effect waves-light">
                                      <i class="fa fa-user-secret white-text"></i>
                                       Proveedores
                                      </a>
                                  </li>
                  
                                 </ul>
                               </div>
                          </li>
                       </ul>

                         <ul class="collapsible" data-collapsible="accordion">
                          <li class="opcion">
                               <a  class="collapsible-header  white-text waves-effect waves-light">
                                  <i class="fa fa-shopping-cart white-text"></i>
                                    Ventas
                               </a>
                                <div class="collapsible-body">
                                 <ul>
                                   <li class="blue-grey darken-4">
                                     <a href="" class="white-text waves-effect waves-light">
                                     <i class="material-icons white-text">library_books</i>
                                     Ventas
                                     </a>
                                   </li>
                                   <li class="blue-grey darken-4">
                                      <a href="" class="white-text waves-effect waves-light">
                                      <i class="fa fa-user white-text"></i>
                                      Clientes
                                      </a>
                                  </li>
                  
                                 </ul>
                               </div>
                          </li>
                       </ul>

                         <ul class="collapsible" data-collapsible="accordion">
                          <li class="opcion">
                               <a  class="collapsible-header  white-text waves-effect waves-light">
                                  <i class="material-icons white-text">contacts</i>
                                    Acceso
                               </a>
                                <div class="collapsible-body">
                                 <ul>
                                   <li class="blue-grey darken-4">
                                     <a href="" class="white-text waves-effect waves-light">
                                     <i class="material-icons white-text">accessibility</i>
                                     Administradores
                                     </a>
                                   </li>
                                  
                                 </ul>
                               </div>
                          </li>
                       </ul>
                  
      </ul>
                   <!--   FIN DEL MENU MOVIL  --> 
  </header>

    <!--    MENU LATERAL   -->
     
      <ul class="side-nav fixed blue-grey darken-4 menu" id="slide-out">
      
          <div id="blank-space"></div>
                       <div class="truncate"></div>
                       <div class="space">
                          <div class="col s3">
                            
                          </div>
                          <div class="col s9 ">
                            <p class="left-align white-text name-text hide-on-med-and-down"></p>   
                         </div>       
                       </div>

                       <div class="truncate margin hide-on-med-and-up"></div>
      

                       <div class="card-panel #000000 black z-depth-2">
                           <span class="grey-text">MENÚ</span>
                       </div>

                       <ul class="collapsible" data-collapsible="accordion">
                          <li class="opcion">
                               <a class="collapsible-header  white-text waves-effect waves-light">
                                  <i class="fa fa-briefcase white-text"></i>
                                    Almacén
                               </a>
                                <div class="collapsible-body">
                                 <ul>
                                   <li class="blue-grey darken-4">
                                     <a href="{!!URL::to('/categorias')!!}" class="white-text waves-effect waves-light">
                                     <i class="fa fa-book white-text"></i>
                                     Categorías
                                     </a>
                                   </li>
                                   <li class="blue-grey darken-4">
                                      <a href="{!!URL::to('/articulos')!!}" class="white-text waves-effect waves-light">
                                      <i class="fa fa-shopping-basket white-text"></i>
                                       Artículos
                                      </a>
                                  </li>
                  
                                 </ul>
                               </div>
                          </li>
                       </ul>


                      

                         <ul class="collapsible" data-collapsible="accordion">
                          <li class="opcion">
                               <a  class="collapsible-header  white-text waves-effect waves-light">
                                  <i class="material-icons white-text">contacts</i>
                                    Acceso
                               </a>
                                <div class="collapsible-body">
                                 <ul>
                                   <li class="blue-grey darken-4">
                                     <a href="" class="white-text waves-effect waves-light">
                                     <i class="material-icons white-text">accessibility</i>
                                     Administradores
                                     </a>
                                   </li>
                                  
                                 </ul>
                               </div>
                          </li>
                       </ul>
      
      </ul>
  <!-- Dropdown Structure -->
         <ul id="dropdown1" class="dropdown-content">
          <li>
            <a class="blue-grey darken-4 white-text" href="">
             <i class="fa fa fa-cogs"></i> Configuración </a>
          </li>
          <li>
          <a class="blue-grey darken-4 white-text" href="{!!URL::to('/logout')!!}">
             <i class="fa fa-sign-out"></i> Cerrar sesión </a>
          </li>
         </ul>

  <main id="main">
   
       @yield('content')
 
  </main>

  <footer id="footer" class="page-footer #01579b light-blue darken-4 " >
      <div class="container ">
            <div class="row">
              <div class="col l6 s12">
                <h5 class="white-text"><br></h5>
                <p class="grey-text text-lighten-4"><br></p>
              </div>
              <div class="col l4 offset-l2 s12">
                <h5 class="white-text"></h5>
                <ul>
                  <li><a class="grey-text text-lighten-3" href="#!"></a></li>
                  <li><a class="grey-text text-lighten-3" href="#!"></a></li>
                  <li><a class="grey-text text-lighten-3" href="#!"></a></li>
                  <li><a class="grey-text text-lighten-3" href="#!"></a></li>
                </ul>
              </div>
            </div>
          </div>
          <div class="footer-copyright">
            <div class="container">
            © 2014 Copyright Text
            <a class="grey-text text-lighten-4 right" href="#!">More Links</a>
            </div>
          </div>

  </footer>
 
	
  {!! Html::script('bower_components/jquery/dist/jquery.min.js') !!}
  @stack('scripts')
  {!! Html::script('bower_components/vue/dist/vue.min.js') !!}
	{!! Html::script('bower_components/materialize/dist/js/materialize.min.js') !!}
  {!! Html::script('/js/jquery.validate.min.js') !!}
  {!! Html::script('/js/additional-methods.min.js') !!}
  {!! Html::script('/js/select2.full.min.js') !!}
  {!! Html::script('/js/select2.min.js') !!}
  {!! Html::script('/js/validation.js') !!}
  {!! Html::script('/js/validationCat.js') !!}
  {!! Html::script('/js/validationArt.js') !!}
  {!! Html::script('/js/validationProvee.js') !!}
  {!! Html::script('/js/validationClie.js') !!}
  {!! Html::script('/js/validationIng.js') !!}
  {!! Html::script('/js/validationVen.js') !!}

  <script>
     $(document).ready(function(){

    $(".button-collapse").sideNav({
        menuWidth: 300,
      });
    $('ul.tabs').tabs();
    $('.modal').modal();
    $("#particulo_id").select2({});
    $("#proveedor_id").select2({});
    $("#cliente_id").select2({});
    $('select').material_select();
    $('.collapsible').collapsible();
    $('.dropdown-button').dropdown({
      inDuration: 300,
      outDuration: 225,
      constrain_width: false, // Does not change width of dropdown to that of the activator
      hover: false, // Activate on hover
      gutter: 0,  // Spacing from edge
      belowOrigin: true, // Displays dropdown below the button
      alignment: 'right' // Displays dropdown with edge aligned to the left of button
    });

  });
   </script>

</body>
</html>