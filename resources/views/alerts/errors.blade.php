@if(Session::has('message-error'))

{!! Html::script('bower_components/jquery/dist/jquery.min.js') !!}

<script>
  $(document).ready(function(){
  
    Materialize.toast(' {{Session::get('message-error')}}', 5000,'#c62828 red darken-3');
   
});
</script>


@endif