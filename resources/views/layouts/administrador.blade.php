<!doctype html>
<html class="no-js h-100" lang="en">
  <head>
    <meta name="csrf-token" content="{{ csrf_token() }}"> 
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">

    <title>Arcadia</title>
    <meta name="description" content="A high-quality &amp; free Bootstrap admin dashboard template pack that comes with lots of templates and components.">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="{{ asset('administradores/all.css') }}" rel="stylesheet">
    <link href="{{ asset('administradores/icon.css') }}" rel="stylesheet">    
    <link rel="stylesheet" href="{{ asset('administradores/bootstrap.min.css') }}" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" id="main-stylesheet" data-version="1.1.0" href="{{ asset('administradores/styles/shards-dashboards.1.1.0.min.css') }}">
    <link rel="stylesheet" href="{{ asset('administradores/styles/extras.1.1.0.min.css') }}">
    @yield('style')
    
    

   

</head>
 <div class="container-fluid">
    	
      <div class="row">
        <!-- Main Sidebar -->
        <aside class="main-sidebar col-12 col-md-3 col-lg-2 px-0">
          <div class="main-navbar">
            <nav class="navbar align-items-stretch navbar-light bg-white flex-md-nowrap border-bottom p-0">
              <a class="navbar-brand w-100 mr-0" href="#" style="line-height: 25px;">
                <div class="d-table m-auto">
                  <img id="main-logo" class="d-inline-block align-top mr-1" style="max-width: 25px;" src="{{ asset('administradores/images/photoshop.png') }}" alt="Shards Dashboard">
                  <span class="d-none d-md-inline ml-1"><B>SOFTWARE ARCADIA</B></span>
                </div>
              </a>
              <a class="toggle-sidebar d-sm-inline d-md-none d-lg-none">
                <i class="material-icons">&#xE5C4;</i>
              </a>
            </nav>
          </div>
          <form action="#" class="main-sidebar__search w-100 border-right d-sm-flex d-md-none d-lg-none">
            <div class="input-group input-group-seamless ml-3">
              <div class="input-group-prepend">
                <div class="input-group-text">
                  <i class="fas fa-search"></i>
                </div>
              </div>
              <input class="navbar-search form-control" type="text" placeholder="Search for something..." aria-label="Search"> </div>
          </form>
          <div class="nav-wrapper">
            <ul class="nav flex-column">
              <li class="nav-item">
                <a class="nav-link active" href="{{ route('home.admin')}}">
                  <i class="material-icons">home</i>
                  <span>Principal</span>
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link " href="{{ route('area.gestion') }}">
                  <i class="material-icons">brightness_auto</i>
                  <span>Areas</span>
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link " href="{{ route('asignatura.gestion') }}">
                  <i class="material-icons">local_mall</i>
                  <span>Asignaturas</span>
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link " href="{{ route('estudiante.gestion') }}">
                  <i class="material-icons">face</i>
                  <span>Estudiantes</span>
                </a>
              </li>              
              <li class="nav-item">
                <a class="nav-link " href="{{ route('curso.gestion') }}">
                  <i class="material-icons">school</i>
                  <span>Cursos</span>
                </a>
              </li>              
              <!--<li class="nav-item">
                <a class="nav-link " href="user-profile-lite.html">
                  <i class="material-icons">person</i>
                  <span>Perfil Administrador</span>
                </a>
              </li>-->
              <li class="nav-item">
                <a class="nav-link" href="{{ route('docente.gestion') }}">
                  <i class="material-icons">supervised_user_circle</i>
                  <span>Docentes</span>
                </a>
              </li>
            </ul>
          </div>
        </aside>
        <!-- End Main Sidebar -->
        <main class="main-content col-lg-10 col-md-9 col-sm-12 p-0 offset-lg-2 offset-md-3">
          <div class="main-navbar sticky-top bg-white">
            <!-- Main Navbar -->
            <nav class="navbar align-items-stretch navbar-light flex-md-nowrap p-0">
              <form action="#" class="main-navbar__search w-100 d-none d-md-flex d-lg-flex">
                <div class="input-group input-group-seamless ml-3">
                  <div class="input-group-prepend">
                    <div class="input-group-text">
                      <!--<i class="fas fa-search"></i>-->
                    </div>
                  </div>
                  <input class="navbar-search form-control" type="text" placeholder="Search for something..." aria-label="Search"> </div>
              </form>
             <!-- <ul class="navbar-nav border-left flex-row ">
                <li class="nav-item border-right dropdown notifications">
                  <a class="nav-link nav-link-icon text-center" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <div class="nav-link-icon__wrapper">
                      <i class="material-icons">&#xE7F4;</i>
                      <span class="badge badge-pill badge-danger">2</span>
                    </div>
                  </a>
                  <div class="dropdown-menu dropdown-menu-small" aria-labelledby="dropdownMenuLink">
                    <a class="dropdown-item" href="#">
                      <div class="notification__icon-wrapper">
                        <div class="notification__icon">
                          <i class="material-icons">&#xE6E1;</i>
                        </div>
                      </div>
                      <div class="notification__content">
                        <span class="notification__category">Analytics</span>
                        <p>Your website’s active users count increased by
                          <span class="text-success text-semibold">28%</span> in the last week. Great job!</p>
                      </div>
                    </a>
                    <a class="dropdown-item" href="#">
                      <div class="notification__icon-wrapper">
                        <div class="notification__icon">
                          <i class="material-icons">&#xE8D1;</i>
                        </div>
                      </div>
                      <div class="notification__content">
                        <span class="notification__category">Sales</span>
                        <p>Last week your store’s sales count decreased by
                          <span class="text-danger text-semibold">5.52%</span>. It could have been worse!</p>
                      </div>
                    </a>
                    <a class="dropdown-item notification__all text-center" href="#"> View all Notifications </a>
                  </div>
                </li>-->
                <li class="nav-item dropdown">
                  <a class="nav-link dropdown-toggle text-nowrap px-3" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
                    <img class="user-avatar rounded-circle mr-2" src="{{ ('administradores/images/avatars/1.jpg') }}" alt="User Avatar">
                    <span class="d-none d-md-inline-block">Administrador</span>
                  </a>
                  <div class="dropdown-menu dropdown-menu-small">
                    <!--<a class="dropdown-item" href="user-profile-lite.html">
                      <i class="material-icons">&#xE7FD;</i> Profile</a>
                    <a class="dropdown-item" href="components-blog-posts.html">
                      <i class="material-icons">vertical_split</i> Blog Posts</a>
                    <a class="dropdown-item" href="add-new-post.html">
                      <i class="material-icons">note_add</i> Add New Post</a>
                    <div class="dropdown-divider"></div>-->
                    <a class="dropdown-item text-danger" href="{{ route('logout') }}">
                    	
                      <i class="material-icons text-danger">&#xE879;</i> Cerrar sesion </a>
                  </div>
                </li>
              </ul>
              <nav class="nav">
                <a href="#" class="nav-link nav-link-icon toggle-sidebar d-md-inline d-lg-none text-center border-left" data-toggle="collapse" data-target=".header-navbar" aria-expanded="false" aria-controls="header-navbar">
                  <i class="material-icons">&#xE5D2;</i>
                </a>
              </nav>
            </nav>
          </div>
    	<div class="main-content-container container-fluid px-4">   
    		<!--CODIGO-->
    		@yield('contenido')
    		<!--FIN CODIGO-->
    	</div>  	
    	
        </main>
      </div>
    </div> 


    
   
    <script src="{{ asset('js/popper.min.js') }}"></script>
    <!--<script src="{{ asset('js/bootstrap.min.js') }}"></script>-->
    <script src="{{ asset('js/jquery-3.3.1.js') }}"></script>   
    <script async defer src="{{ asset('administradores/scripts/buttons.js') }}"></script>
    
    <script type="text/javascript" src="{{ asset('js/notify.js') }}"></script>
    <script src="{{ asset('administradores/scripts/popper.min.js') }}" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="{{ asset('administradores/scripts/bootstrap.min.js') }}" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    <script src="{{ asset('administradores/scripts/Chart.min.js') }}"></script>
    <script src="{{ asset('administradores/scripts/shards.min.js') }}"></script>
    <script src="{{ asset('administradores/scripts/jquery.sharrre.min.js') }}"></script>
    <script src="{{ asset('administradores/scripts/extras.1.1.0.min.js') }}"></script>
    <script src="{{ asset('administradores/scripts/shards-dashboards.1.1.0.min.js') }}"></script>
    <script src="{{ asset('administradores/scripts/app/app-blog-overview.1.1.0.js') }}"></script>	

    @yield('scripts')
 </body>
</html>    