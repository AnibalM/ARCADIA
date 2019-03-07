@extends('layouts.administrador')

@section('style')
@endsection


@section('contenido')
<div style="width: 600px; height: 600px;"> 
	<h3><center><B>DOCENTES</B></center></h3>
	<canvas id="ejemplo"></canvas>
    <script>
        var total =  [];
        var edad = [];

    </script>
    
    @foreach($edades as $edades)
    <script> 
    total.push({{ $edades->total }} );

    edad.push("{{ $edades->edad }}");
    </script> 
    @endforeach
   

    
</div>
@endsection







@section('scripts')
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.3/Chart.js"></script>
<script type="text/javascript">
	var ctx = document.getElementById('ejemplo').getContext('2d');
    var chart = new Chart(ctx, {
    // The type of chart we want to create
    type: 'line',

    // The data for our dataset
    data: {
        labels: total,
        datasets: [{
            label: "EDAD DOCENTES",
            backgroundColor: 'rgba(0,0,255,0.3)',
            borderColor: 'rgb(0,0,255,0.3)',
            data: edad,
        }]
    },

    // Configuration options go here
    options: {}
});
</script>
@endsection