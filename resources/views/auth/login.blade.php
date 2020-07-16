<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <title>Dulceria El Profe</title>
    {!! Html::style('bower_components/materialize/dist/css/materialize.min.css') !!}
    {!! Html::style('/css/font-awesome.min.css') !!}
  {!! Html::style('/css/app.css') !!}
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
</head>
<body>

 <header>

    <!--BARRA DE NAVEGACION-->
    <div class="navbar-fixed">
      <nav>
    <div class="nav-wrapper #01579b light-blue darken-4">
      <a href="#!" class="brand-logo"></a>
      <a href="#" data-activates="mobile-demo" class="button-collapse"><i class="material-icons">menu</i></a>
      <ul class="right hide-on-med-and-down">
 
      </ul>
      <ul class="side-nav" id="mobile-demo">

      </ul>
    </div>
  </nav>
   </div>  
  </header>
  <!--FIN BARRA DE NAVEGACION-->



  <br><br><br>


<main>
    <div class="row container">
         <div class="col s12 l6 offset-l3 ">
              <div class="card medium z-depth-3">
                <div class="row">

                <br>
                <br>
                <br>
                <!--Formulario del autenticacion para los diferentes usuarios del sistema-->
                  
                   {!!Form::open(['route'=>'log.store','method'=>'POST','autocomplete'=>'off','class'=>'col s12 m10 l10 '])!!}
                    <div class="row">

                     <!--elemementos del formulario--> 

                       <!--Se manda una alerta en caso de que el email y password sean incorrectos-->

                     @include('alerts.errors')

                     <div class="space2"></div>
                     <div class="input-field col s10 m12 l10 offset-l2 offset-s1 offset-m1">
                        <i class="material-icons prefix">account_circle</i>
                        {!!Form::email('email',null,['class'=>'validate','id'=>'icon_prefix'])!!}
                        {!!Form::label('correo','Correo:')!!}
                      </div>
                     
                     <div class="input-field">
                        <div class="space2"></div>
                      </div>

                      <div class="input-field col s10 m12 l10 offset-l2 offset-s1 offset-m1">
                        <i class="material-icons prefix">vpn_key</i>
                        {!!Form::password('password',['class'=>'validate','id'=>'icon_telephone'])!!}
                         {!!Form::label('contrasena','Contraseña')!!}
                      </div>

                      <!--Fin de elementos del formulario-->
                     

                      <!--Button de envio del formulario-->
                     <div class="card-action">
                         {!!Form::submit('Entrar',['class'=>'btn-large waves-effect waves-light col s12 l10 offset-l1 #01579b light-blue darken-4'])!!}
                         
                     </div>
                     <!--Fin del boton-->

                    </div>
                  {!!Form::close()!!}

                  <!--Fin del formulario-->
                </div>        
              </div>
            </div> 

    </div>
  </main> 

  <br>
  <br>
  <br>
  <br>

   <footer class="page-footer #01579b light-blue darken-4">
          <div class="container">
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
    {!! Html::script('bower_components/materialize/dist/js/materialize.min.js') !!}
</body>
</html>