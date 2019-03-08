@extends('layouts.administrador')

@section('contenido')  

            <!-- Page Header -->
            <div class="page-header row no-gutters py-4">
              <div class="col-12 col-sm-4 text-center text-sm-left mb-0">
                <span class="text-uppercase page-subtitle">SOFTWARE ARCADIA</span>
                <h3 class="page-title">PAGINA PRINCIPAL</h3>
              </div>
            </div>
            <!-- End Page Header -->
            <!-- Small Stats Blocks -->
            <div class="row">
              <!-- Areas -->
              <div class="col-lg col-md-6 col-sm-6 mb-4">
                <div class="stats-small stats-small--1 card card-small">
                  <div class="card-body p-0 d-flex">
                    <div class="d-flex flex-column m-auto">
                      <div class="stats-small__data text-center">
                        <span class="stats-small__label text-uppercase">Areas</span>
                        <h6 class="stats-small__value count my-3" id="chart_areas">0</h6>
                      </div>
                    </div>
                    <canvas height="120" class="blog-overview-stats-small-1"></canvas>
                  </div>
                </div>
              </div>
              <!-- Asignaturas -->
              <div class="col-lg col-md-6 col-sm-6 mb-4">
                <div class="stats-small stats-small--1 card card-small">
                  <div class="card-body p-0 d-flex">
                    <div class="d-flex flex-column m-auto">
                      <div class="stats-small__data text-center">
                        <span class="stats-small__label text-uppercase">Asignaturas</span>
                        <h6 class="stats-small__value count my-3" id="chart_asignaturas">0</h6>
                      </div>
                    </div>
                    <canvas height="120" class="blog-overview-stats-small-2"></canvas>
                  </div>
                </div>
              </div>
              <!-- Cursos -->
              <div class="col-lg col-md-4 col-sm-6 mb-4">
                <div class="stats-small stats-small--1 card card-small">
                  <div class="card-body p-0 d-flex">
                    <div class="d-flex flex-column m-auto">
                      <div class="stats-small__data text-center">
                        <span class="stats-small__label text-uppercase">Cursos</span>
                        <h6 class="stats-small__value count my-3" id="chart_cursos">0</h6>
                      </div>                      
                    </div>
                    <canvas height="120" class="blog-overview-stats-small-3"></canvas>
                  </div>
                </div>
              </div>
              <!-- Estudiantes -->
              <div class="col-lg col-md-4 col-sm-6 mb-4">
                <div class="stats-small stats-small--1 card card-small">
                  <div class="card-body p-0 d-flex">
                    <div class="d-flex flex-column m-auto">
                      <div class="stats-small__data text-center">
                        <span class="stats-small__label text-uppercase">Estudiantes</span>
                        <h6 class="stats-small__value count my-3" id="chart_estudiantes">0</h6>
                      </div>                      
                    </div>
                    <canvas height="120" class="blog-overview-stats-small-4"></canvas>
                  </div>
                </div>
              </div>
              <!-- ocentes -->
              <div class="col-lg col-md-4 col-sm-12 mb-4">
                <div class="stats-small stats-small--1 card card-small">
                  <div class="card-body p-0 d-flex">
                    <div class="d-flex flex-column m-auto">
                      <div class="stats-small__data text-center">
                        <span class="stats-small__label text-uppercase">Docentes</span>
                        <h6 class="stats-small__value count my-3" id="chart_docentes">0</h6>
                      </div>                      
                    </div>
                    <canvas height="120" class="blog-overview-stats-small-5"></canvas>
                  </div>
                </div>
              </div>
            </div>
            <!-- End Small Stats Blocks -->
            <div class="row">
              <!-- Users Stats -->
              <div class="col-lg-8 col-md-12 col-sm-12 mb-4">
                <div class="card card-small">
                  <div class="card-header border-bottom">
                    <h6 class="m-0">Notas de estudiantes por curso</h6>
                  </div>
                  <div class="card-body pt-0">
                    <div class="row border-bottom py-2 bg-light">
                      <div class="col-md-1 col-sm-1 col-xs-12">
                        <div id="blog-overview-date-range" class="input-daterange input-group input-group-sm my-auto ml-auto mr-auto ml-sm-auto mr-sm-0" style="max-width: 350px;">
                          <label>Grado</label>
                          <select name="grado" id="grado" onchange="graficar_notas_estudiantes()" class="input-sm form-control">
                            @foreach ($cursos as $curso)
                              <option value="{{$curso->idCurso}}">{{$curso->Grado}}</option>
                            @endforeach
                          </select>
                        </div>
                      </div>
                    </div>
                    <canvas height="130" style="max-width: 100% !important;" class="blog-overview-users"></canvas>
                  </div>
                </div>
              </div>
              <!-- End Users Stats -->
              <!-- Users By Device Stats -->
              <div class="col-lg-4 col-md-6 col-sm-12 mb-4">
                <div class="card card-small h-100">
                  <div class="card-header border-bottom">
                    <h6 class="m-0">Estudiantes, Aprobados - Reprobados</h6>
                  </div>
                  <div class="card-body d-flex py-0">
                    <canvas height="220" class="blog-users-by-device m-auto"></canvas>
                  </div>
                </div>
              </div>
              <!-- End Users By Device Stats -->
            </div> 
            <footer class="main-footer d-flex p-2 px-3 bg-white border-top">
            <ul class="nav">
              <li class="nav-item">
                <a class="nav-link" href="#">Andres Cáceres</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">-</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">Anibal Manjarrez</a>
              </li>
              <!--
              <li class="nav-item">
                <a class="nav-link" href="#">Products</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">Blog</a>
              </li>
              -->
            </ul>
            <span class="copyright ml-auto my-auto mr-2">Software
              <a href="https://designrevision.com" rel="nofollow">Arcadia</a>
            </span>
          </footer>
        </main>
      </div>
    </div> 
    <script src="{{ asset('js/jquery-3.3.1.js') }}"></script>   
    <script type="text/javascript">
      $(document).ready(() => {
        $.ajaxSetup({
          headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
        });
        $.ajax({
          type: "GET",
          url: "{{ route('home.estadisticas') }}",
          success: (success) => {
            $("#chart_areas").text(success.areas);
            $("#chart_asignaturas").text(success.asignaturas);
            $("#chart_cursos").text(success.cursos);
            $("#chart_estudiantes").text(success.estudiantes);
            $("#chart_docentes").text(success.docentes);
            graficar_apro_repro(success.apro_repro);
          }
        });
        graficar_notas_estudiantes();
      });
      function graficar_notas_estudiantes() {
        $.ajax({
          type: "POST",
          url: "{{ route('home.estadisticas2') }}",
          data: {"curso":$("#grado").val()},
          success: (success) => {
            notas_estudiantes(success);
          }
        });
      }
      function graficar_apro_repro(data) {
        var ubdData = {
          datasets: [{
            hoverBorderColor: '#ffffff',
            data: data,
            backgroundColor: [
              'rgba(0,123,255,0.9)',
              'rgba(206,2,2,0.5)'
            ]
          }],
          labels: ["Aprobados", "Reprobados",]
        };

        // Options
        var ubdOptions = {
          legend: {
            position: 'bottom',
            labels: {
              padding: 25,
              boxWidth: 20
            }
          },
          cutoutPercentage: 0,
          // Uncomment the following line in order to disable the animations.
          // animation: false,
          tooltips: {
            custom: false,
            mode: 'index',
            position: 'nearest'
          }
        };

        var ubdCtx = document.getElementsByClassName('blog-users-by-device')[0];

        // Generate the users by device chart.
        window.ubdChart = new Chart(ubdCtx, {
          type: 'pie',
          data: ubdData,
          options: ubdOptions
        });
      }
      function notas_estudiantes(data) {
        var bouCtx = document.getElementsByClassName('blog-overview-users')[0];

        // Data
        var bouData = {
          // Generate the days labels on the X axis.
          labels: Array.from(new Array(30), function (_, i) {
            return i === 0 ? 1 : i;
          }),
          datasets: [{
            label: 'Aprobados',
            fill: 'start',
            data: data.apro,
            backgroundColor: 'rgba(0,123,255,0.1)',
            borderColor: 'rgba(0,123,255,1)',
            pointBackgroundColor: '#ffffff',
            pointHoverBackgroundColor: 'rgb(0,123,255)',
            borderWidth: 1.5,
            pointRadius: 0,
            pointHoverRadius: 3
          }, {
            label: 'Reprobados',
            fill: 'start',
            data: data.repro,
            backgroundColor: 'rgba(255,65,105,0.1)',
            borderColor: 'rgba(255,65,105,1)',
            pointBackgroundColor: '#ffffff',
            pointHoverBackgroundColor: 'rgba(255,65,105,1)',
            borderDash: [3, 3],
            borderWidth: 1,
            pointRadius: 0,
            pointHoverRadius: 2,
            pointBorderColor: 'rgba(255,65,105,1)'
          }]
        };

        // Options
        var bouOptions = {
          responsive: true,
          legend: {
            position: 'top'
          },
          elements: {
            line: {
              // A higher value makes the line look skewed at this ratio.
              tension: 0.3
            },
            point: {
              radius: 0
            }
          },
          scales: {
            xAxes: [{
              gridLines: false,
              ticks: {
                callback: function (tick, index) {
                  // Jump every 7 values on the X axis labels to avoid clutter.
                  return index % 7 !== 0 ? '' : tick;
                }
              }
            }],
            yAxes: [{
              ticks: {
                suggestedMax: 45,
                callback: function (tick, index, ticks) {
                  if (tick === 0) {
                    return tick;
                  }
                  // Format the amounts using Ks for thousands.
                  return tick > 999 ? (tick/ 1000).toFixed(1) + 'K' : tick;
                }
              }
            }]
          },
          // Uncomment the next lines in order to disable the animations.
          // animation: {
          //   duration: 0
          // },
          hover: {
            mode: 'nearest',
            intersect: false
          },
          tooltips: {
            custom: false,
            mode: 'nearest',
            intersect: false
          }
        };

        // Generate the Analytics Overview chart.
        window.BlogOverviewUsers = new Chart(bouCtx, {
          type: 'LineWithLine',
          data: bouData,
          options: bouOptions
        });

        // Hide initially the first and last analytics overview chart points.
        // They can still be triggered on hover.
        var aocMeta = BlogOverviewUsers.getDatasetMeta(0);
        aocMeta.data[0]._model.radius = 0;
        aocMeta.data[bouData.datasets[0].data.length - 1]._model.radius = 0;

        // Render the chart.
        window.BlogOverviewUsers.render();
      }
    </script>         
@endsection