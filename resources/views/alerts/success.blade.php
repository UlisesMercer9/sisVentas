@if(Session::has('message'))

 {!! Html::script('bower_components/jquery/dist/jquery.min.js') !!}

<script>
  $(document).ready(function(){
  
    Materialize.toast('{{Session::get('message')}}', 5000,'green accent-4');
   
});
</script>
   
@endif