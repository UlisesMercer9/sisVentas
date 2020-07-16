$(document).ready(function(){

    var email = $("#email").val();

        $.validator.setDefaults({
          highlight: function(element){
            $(element)
               .closest('.input-field')
               .addClass('input-field2');
               
          },
           unhighlight: function(element){
            $(element)
               .closest('.input-field')
               .removeClass('input-field2');
          }

        });

        $.validator.addMethod('latinos', function(value, element)
        {
           return this.optional(element) || /^[a-zA-ZáéíóúàèìòùÀÈÌÒÙÁÉÍÓÚñÑüÜ_\s]+$/i.test(value);
        });
      
        $("#AdminCreateForm").validate({

           rules:{
            name: {
              required: true,
              latinos: true
             },
            email: {
              required: true,
              email: true,
              remote: {
                   url: 'http://localhost:8000/checkmail?email=' + email,
                   type: "get"          
               }
             },
            password: {
              required: true
             },
            password2: {
              required: true,
              equalTo: "#password"

             },
            path:{
              required:true
             }
           },
           messages: {
            name: {
              required: 'El campo nombre es obligatorio',
              latinos: 'Solo se aceptan letras'
            },
            email: {
              required: 'El campo email es obligatorio',
              email:   'Introduzca un email valido ',
              remote: 'El correo ya esta en uso'
                
            },
            password:{
              required: 'La contraseña es obligatoria'
            },
            password2:{
              required: 'La contraseña es obligatoria',
              equalTo: 'Las contraseñas deben coincidir'
            },
            path:{
              required: 'La imagen es obligatoria'
            }
            
           },
             errorElement : 'div',
        errorPlacement: function(error, element) {
          var placement = $(element).data('error');
          if (placement) {
            $(placement).append(error)
          } else {
            error.insertAfter(element);
          }
        }
        });

          $("#AdminUpdateForm").validate({

           rules:{
            name: {
              required: true,
              latinos: true
             },

            email: {
              required: true,
              email: true
            
             },


          
            password2: {
              
              equalTo: "#password"

             }
           
           },
           messages: {
            name: {
              required: 'El campo nombre es obligatorio',
              latinos: 'Solo se aceptan letras'
            },

               email: {
              required: 'El campo email es obligatorio',
              email:   'Introduzca un email valido ',
              remote: 'El correo ya esta en uso'
                
            },
           
            password2:{
              
              equalTo: 'Las contraseñas deben coincidir'
            }
           
            
           },
             errorElement : 'div',
        errorPlacement: function(error, element) {
          var placement = $(element).data('error');
          if (placement) {
            $(placement).append(error)
          } else {
            error.insertAfter(element);
          }
        }
        });
  });