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
      
        $("#CatCreateForm").validate({

           rules:{
            nombre: {
              required: true,
              latinos: true
             }
           },
           messages: {
            nombre: {
              required: 'El campo categoría es obligatorio',
              latinos: 'Solo se aceptan letras'
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

          $("#catUpdateForm").validate({

            rules:{
            nombre: {
              required: true,
              latinos: true
             }
           },
           messages: {
            nombre: {
              required: 'El campo categoría es obligatorio',
              latinos: 'Solo se aceptan letras'
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