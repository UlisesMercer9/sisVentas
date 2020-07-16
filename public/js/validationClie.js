$(document).ready(function(){


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
      
        $("#ClieCreateForm").validate({

           rules:{

            nombre: {
              required: true,
              latinos: true
             }

           },
           messages: {

            nombre: {
              required: 'El campo nombre es obligatorio',
              latinos: 'Es este campo no se aceptan numeros'
                  
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

          $("#ClieUpdateForm").validate({

            
           rules:{

            nombre: {
              required: true,
              latinos: true
             }

           },
           messages: {

            nombre: {
              required: 'El campo nombre es obligatorio',
              latinos: 'Es este campo no se aceptan numeros'
                  
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