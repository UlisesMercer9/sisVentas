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
      
        $("#VentaCreateForm").validate({

           rules:{

           
             cliente_id: {
              required: true
             },

             tipo_comprobante: {
              required: true
             },
             serie_comprobante: {
              required: true
             },
             num_comprobante: {
              required: true,
              digits: true 
             }

           },
           messages: {

              cliente_id: {
              required: 'El campo cliente es obligatorio'
            },
            tipo_comprobante: {
              required: 'El campo tipo comprobante es obligatorio'
             },
             serie_comprobante: {
              required: 'El campo serie comprobante es obligatorio'
             },
             num_comprobante: {
              required: 'El campo numero comprobante es obligatorio',
              digits: 'Solo se aceptan numeros'
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