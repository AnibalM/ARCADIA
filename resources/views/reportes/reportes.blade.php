@extends('layouts.administrador')

@section('style')
@endsection


@section('contenido')
<div style="width: 700px; height: 700px;"> 
	<B>DOCENTES</B>
	<canvas id="ejemplo"></canvas>

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
        labels: [1,2,4,2,6,5,2],
        datasets: [{
            label: "EDAD DOCENTES",
            backgroundColor: 'rgba(0,0,255,0.3)',
            borderColor: 'rgb(0,0,255,0.3)',
            data: ["20", "23", "30", "31", "35", "42", "50"],
        }]
    },

    // Configuration options go here
    options: {}
});
</script>
@endsection