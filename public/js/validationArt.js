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
      
        $("#ArtCreateForm").validate({

           rules:{
            codigo: {
              required: true
             },
            nombre: {
              required: true,
              latinos: true
             },
            stock: {
              required: true,
              digits: true
             },
            categorias_id:{
              required:true
             }
           },
           messages: {
            codigo: {
              required: 'El campo codigo es obligatorio'
             
            },
            nombre: {
              required: 'El campo nombre es obligatorio',
              latinos: 'Es este campo no se aceptan numeros'
                  
            },
            stock:{
              required: 'El campo stock es obligatorio',
              digits: 'Solo se aceptan numeros'
            },
          
            categorias_id:{
              required: 'El campo categoria es obligatorio'
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

          $("#ArtUpdateForm").validate({

             rules:{
            codigo: {
              required: true
             },
            nombre: {
              required: true,
              latinos: true
             },
            stock: {
              required: true,
              digits: true
             },
            categorias_id:{
              required:true
             }
           },
           messages: {
            codigo: {
              required: 'El campo codigo es obligatorio'
             
            },
            nombre: {
              required: 'El campo nombre es obligatorio',
              latinos: 'Es este campo no se aceptan numeros'
                  
            },
            stock:{
              required: 'El campo stock es obligatorio',
              digits: 'Solo se aceptan numeros'
            },
          
            categorias_id:{
              required: 'El campo categoria es obligatorio'
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