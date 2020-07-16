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

         $.validator.addMethod("regex", function(value, element, regexpr) {          
            return regexpr.test(value);
         }, "Solo se aceptan numeros y puntos decimales");  
      
        $("#ProducCreateForm").validate({

           rules:{
            nombre: {
              required: true,
              latinos: true
             },
            precioVenta: {
              required: true,
              regex: /^[0-9.]+$/
             
             },
            precioCompra: {
              required: true,
              regex: /^[0-9.]+$/
             },
            existencias: {
              required: true,
              regex: /^[0-9.]+$/

             }
            
           },
           messages: {
            nombre: {
              required: 'El campo nombre es obligatorio',
              latinos: 'Solo se aceptan letras'
            },
            precioVenta: {
              required: 'El campo precio venta es obligatorio',
          
                
            },
            precioCompra:{
              required: 'El campo precio compra es obligatorio',
          
            },
            existencias:{
              required: 'El campo existencias es obligatorio',
          
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

          $("#ProducUpdateForm").validate({

             rules:{
            nombre: {
              required: true,
              latinos: true
             },
            precioVenta: {
              required: true,
              regex: /^[0-9.]+$/
             
             },
            precioCompra: {
              required: true,
              regex: /^[0-9.]+$/
             },
            existencias: {
              required: true,
              regex: /^[0-9.]+$/

             }
            
           },
           messages: {
            nombre: {
              required: 'El campo nombre es obligatorio',
              latinos: 'Solo se aceptan letras'
            },
            precioVenta: {
              required: 'El campo precio venta es obligatorio',
          
                
            },
            precioCompra:{
              required: 'El campo precio compra es obligatorio',
          
            },
            existencias:{
              required: 'El campo existencias es obligatorio',
          
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