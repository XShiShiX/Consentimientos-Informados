<!doctype html>
<html lang="{{ config('app.locale') }}">

<head>

<script>

    var fecha = document.getElementById("fechanacimiento").value;
    var edad = calcularEdad(fecha);

    function calcularEdad(fecha) {
    var hoy = new Date();
    var cumpleanos = new Date(fecha);
    var edad = hoy.getFullYear() - cumpleanos.getFullYear();
    var m = hoy.getMonth() - cumpleanos.getMonth();

    if (m < 0 || (m === 0 && hoy.getDate() < cumpleanos.getDate())) {
    edad--;
    return edad < 18;
    }
    }
</script>

    <script type="text/javascript">
        function showMe (it, box) {
            document.getElementById(it).style.display = (box.checked) ? "block" : "none";
        }
    </script>

    <style>
        .file {
            visibility: hidden;
            position: absolute;
        }
    </style>

    <style>
        .thumb {
            height: 300px;
            border: 1px solid #000;
            margin: 10px 5px 0 0;
        }
    </style>


  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">

  <title>Consentimientos Informados</title>

  <meta name="description" content="Dashmix - Bootstrap 5 Admin Template &amp; UI Framework created by pixelcave and published on Themeforest">
  <meta name="author" content="pixelcave">
  <meta name="robots" content="noindex, nofollow">

  <!-- CSRF Token -->
  <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- CSS DATATABLE-->
    <link rel="stylesheet" href="//cdn.datatables.net/1.12.0/css/jquery.dataTables.min.css">

    <!--JS CKEditor 5-->
    <script src="https://cdn.ckeditor.com/ckeditor5/30.0.0/classic/ckeditor.js"></script>
    <script src="https://cdn.ckeditor.com/ckeditor5/34.0.0/classic/ckeditor.js"></script>
    <script src="https://cdn.ckeditor.com/ckeditor5/34.0.0/classic/translations/es.js"></script>



    <!-- Icons -->
  <link rel="shortcut icon" href="{{ asset('media/favicons/favicon.png') }}">
  <link rel="icon" sizes="192x192" type="image/png" href="{{ asset('media/favicons/favicon-192x192.png') }}">
  <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('media/favicons/apple-touch-icon-180x180.png') }}">

  <!-- Fonts and Styles -->
  @yield('css_before')
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap">
  <link rel="stylesheet" id="css-main" href="{{ mix('css/dashmix.css') }}">

    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <link type="text/css" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/south-street/jquery-ui.css" rel="stylesheet">
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
    <script type="text/javascript" src="http://keith-wood.name/js/jquery.signature.js"></script>
    <link rel="stylesheet" type="text/css" href="http://keith-wood.name/css/jquery.signature.css">

    <style>
        .kbw-signature { width: 100%; height: 200px;}
        #sig canvas{
            width: 100% !important;
            height: auto;
        }
    </style>



    <!-- You can include a specific file from public/css/themes/ folder to alter the default color theme of the template. eg: -->
  <!-- <link rel="stylesheet" id="css-theme" href="{{ mix('css/themes/xwork.css') }}"> -->
  @yield('css_after')

  <!-- Scripts -->
  <script>
    window.Laravel = {!! json_encode(['csrfToken' => csrf_token()]) !!};
  </script>
</head>

<body>
  <!-- Page Container -->
  <!--
    Available classes for #page-container:

    GENERIC

      'remember-theme'                            Remembers active color theme and dark mode between pages using localStorage when set through
                                                  - Theme helper buttons [data-toggle="theme"],
                                                  - Layout helper buttons [data-toggle="layout" data-action="dark_mode_[on/off/toggle]"]
                                                  - ..and/or Dashmix.layout('dark_mode_[on/off/toggle]')

    SIDEBAR & SIDE OVERLAY

      'sidebar-r'                                 Right Sidebar and left Side Overlay (default is left Sidebar and right Side Overlay)
      'sidebar-mini'                              Mini hoverable Sidebar (screen width > 991px)
      'sidebar-o'                                 Visible Sidebar by default (screen width > 991px)
      'sidebar-o-xs'                              Visible Sidebar by default (screen width < 992px)
      'sidebar-dark'                              Dark themed sidebar

      'side-overlay-hover'                        Hoverable Side Overlay (screen width > 991px)
      'side-overlay-o'                            Visible Side Overlay by default

      'enable-page-overlay'                       Enables a visible clickable Page Overlay (closes Side Overlay on click) when Side Overlay opens

      'side-scroll'                               Enables custom scrolling on Sidebar and Side Overlay instead of native scrolling (screen width > 991px)

    HEADER

      ''                                          Static Header if no class is added
      'page-header-fixed'                         Fixed Header


    FOOTER

      ''                                          Static Footer if no class is added
      'page-footer-fixed'                         Fixed Footer (please have in mind that the footer has a specific height when is fixed)

    HEADER STYLE

      ''                                          Classic Header style if no class is added
      'page-header-dark'                          Dark themed Header
      'page-header-glass'                         Light themed Header with transparency by default
                                                  (absolute position, perfect for light images underneath - solid light background on scroll if the Header is also set as fixed)
      'page-header-glass page-header-dark'         Dark themed Header with transparency by default
                                                  (absolute position, perfect for dark images underneath - solid dark background on scroll if the Header is also set as fixed)

    MAIN CONTENT LAYOUT

      ''                                          Full width Main Content if no class is added
      'main-content-boxed'                        Full width Main Content with a specific maximum width (screen width > 1200px)
      'main-content-narrow'                       Full width Main Content with a percentage width (screen width > 1200px)

    DARK MODE

      'sidebar-dark page-header-dark dark-mode'   Enable dark mode (light sidebar/header is not supported with dark mode)
  -->
  <div id="page-container" class="sidebar-o enable-page-overlay side-scroll page-header-fixed main-content-narrow">
    <!-- Side Overlay-->

    <!-- END Side Overlay -->

    <!-- Sidebar -->
    <!--
      Sidebar Mini Mode - Display Helper classes

      Adding 'smini-hide' class to an element will make it invisible (opacity: 0) when the sidebar is in mini mode
      Adding 'smini-show' class to an element will make it visible (opacity: 1) when the sidebar is in mini mode
          If you would like to disable the transition animation, make sure to also add the 'no-transition' class to your element

      Adding 'smini-hidden' to an element will hide it when the sidebar is in mini mode
      Adding 'smini-visible' to an element will show it (display: inline-block) only when the sidebar is in mini mode
      Adding 'smini-visible-block' to an element will show it (display: block) only when the sidebar is in mini mode
    -->
    <nav id="sidebar" aria-label="Main Navigation">
      <!-- Side Header -->

      <div class="bg-header-dark">

        <div class="content-header bg-white-5">
          <!-- Logo -->

            @if(auth()->user()->role)
                <textarea value="{{$var = 0}}" style="display: none"></textarea>
                @forelse($modules as $module)
                    <textarea value="{{$var = $var+1}}" style="display: none"></textarea>
                @empty
                @endforelse
                @if($var == 0)

                    <span class="d-inline-block" tabindex="0" data-bs-toggle="popover" data-bs-trigger="hover focus" data-bs-content="Crear Modulo de Configuracion">
             <a class="fw-semibold text-white tracking-wide" href="module/create">
             <span class="smini-visible">
              D<span class="opacity-75">x</span>
             </span>
             <span class="smini-hidden">
              Consen<span class="nav-main-link-name opacity-75">timientos</span>

                              <span class="position-absolute top start-100 translate-middle p-2 bg-danger border border-light rounded-circle">
                 <span class="visually-hidden">New alerts</span>
             </span>
                   </span>

                @else
                    <span class="d-inline-block" tabindex="0" data-bs-toggle="popover" data-bs-trigger="hover focus" data-bs-content="Mostrar Modulo de Configuracion">
                    <a class="fw-semibold text-white tracking-wide" href="module">
              <span class="smini-visible">
               D<span class="opacity-75">x</span>
              </span>
                        <span class="smini-hidden">
                Consen<span class="opacity-75">timientos</span>
                </span>
                    </a>
                    </span>
                    @endif


        @else
                <a class="fw-semibold text-white tracking-wide" href="">
            <span class="smini-visible">
              D<span class="opacity-75">x</span>
            </span>
                    <span class="smini-hidden">
              Consen<span class="opacity-75">timientos</span>
            </span>
                </a>
        @endif
          <!-- END Logo -->

          <!-- Options -->
          <div>

            <!-- Toggle Sidebar Style -->
            <!-- Layout API, functionality initialized in Template._uiApiLayout() -->
            <!-- Class Toggle, functionality initialized in Helpers.dmToggleClass() -->
            <button type="button" class="btn btn-sm btn-alt-secondary" data-toggle="class-toggle" data-target="#sidebar-style-toggler" data-class="fa-toggle-off fa-toggle-on" onclick="Dashmix.layout('sidebar_style_toggle');Dashmix.layout('header_style_toggle');">
              <i class="fa fa-toggle-off" id="sidebar-style-toggler"></i>
            </button>
            <!-- END Toggle Sidebar Style -->

            <!-- Dark Mode -->
            <!-- Layout API, functionality initialized in Template._uiApiLayout() -->
            <!--<button type="button" class="btn btn-sm btn-alt-secondary" data-toggle="class-toggle" data-target="#dark-mode-toggler" data-class="far fa" onclick="Dashmix.layout('dark_mode_toggle');">
              <i class="far fa-moon" id="dark-mode-toggler"></i>
            </button>-->
            <!-- END Dark Mode -->

            <!-- Close Sidebar, Visible only on mobile screens -->
            <!-- Layout API, functionality initialized in Template._uiApiLayout() -->
            <button type="button" class="btn btn-sm btn-alt-secondary d-lg-none" data-toggle="layout" data-action="sidebar_close">
              <i class="fa fa-times-circle"></i>
            </button>
            <!-- END Close Sidebar -->
          </div>
          <!-- END Options -->
        </div>
      </div>
      <!-- END Side Header -->

      <!-- Sidebar Scrolling -->
      <div class="js-sidebar-scroll">
        <!-- Side Navigation -->
        <div class="content-side content-side-full">
          <ul class="nav-main">
            <li class="nav-main-item">
              <a class="nav-main-link{{ request()->is('dashboard') ? ' active' : '' }}" href="/client-create">
                <!--<i class="nav-main-link-icon fa fa-location-arrow"></i>-->
                <span class="nav-main-link-name"><i class="fas fa-plus"></i> Crear Cliente </span>
                <!--<span class="nav-main-link-badge badge rounded-pill bg-primary">5</span>-->
              </a>

                <a class="nav-main-link{{ request()->is('dashboard') ? ' active' : '' }}" href="treatment/create">
                    <span class="nav-main-link-name"><i class="fas fa-plus"></i> Crear Tratamiento </span>
                </a>

                <a class="nav-main-link{{ request()->is('dashboard') ? ' active' : '' }}" href="consent/create">
                    <span class="nav-main-link-name"><i class="fas fa-plus"></i>  Crear Consentimiento</span>
                </a>
            </li>


            <li class="nav-main-heading">Otros</li>
            <li class="nav-main-item{{ request()->is('pages/*') ? ' open' : '' }}">
              <a class="nav-main-link nav-main-link-submenu" data-toggle="submenu" aria-haspopup="true" aria-expanded="true" href="#">
                <i class="nav-main-link-icon fa fa-lightbulb"></i>
                <span class="nav-main-link-name">Listas</span>
              </a>
              <ul class="nav-main-submenu">
                      <li class="nav-main-item">
                          <a class="nav-main-link{{ request()->is('pages/datatables') ? ' active' : '' }}" href="/client">
                              <span class="nav-main-link-name">Clientes</span>
                          </a>
                      </li>
                <li class="nav-main-item">
                  <a class="nav-main-link{{ request()->is('pages/slick') ? ' active' : '' }}" href="/treatment">
                      <span class="nav-main-link-name">Tratamientos</span>
                  </a>
                </li>
                <li class="nav-main-item">
                  <a class="nav-main-link{{ request()->is('pages/blank') ? ' active' : '' }}" href="/consent">
                    <span class="nav-main-link-name">Consentimientos</span>
                  </a>
                </li>

@if(auth()->user()->role)
                  <li class="nav-main-item">
                      <a class="nav-main-link{{ request()->is('pages/blank') ? ' active' : '' }}" href="/admin">
                          <span class="nav-main-link-name">Usuarios</span>
                      </a>
                  </li>
                  @endif

              </ul>
            </li>

              @if(auth()->user()->role)
                  <textarea value="{{$var = 0}}" style="display: none"></textarea>
                  @forelse($modules as $module)
                      <textarea value="{{$var = $var+1}}" style="display: none"></textarea>
                  @empty
                  @endforelse
                  @if($var == 0)
                      <span class="d-inline-block" tabindex="0" data-bs-toggle="popover" data-bs-trigger="hover focus" data-bs-content="Crear Modulo de Configuracion">
                      <li class="nav-main-item">
                          <a class="nav-main-link" href="module/create">
                              <i class="nav-main-link-icon fa fa-globe"></i>
                              <span class="nav-main-link-name">Modulo Empresarial</span>
                              <span class="position-absolute top start-100 translate-middle p-2 bg-danger border border-light rounded-circle">
                 <span class="visually-hidden">New alerts</span>
                 </span>
                          </a>
                      </li>
                      </span>
                  @else
                      <span class="d-inline-block" tabindex="0" data-bs-toggle="popover" data-bs-trigger="hover focus" data-bs-content="Mostrar Modulo de Configuracion">
                  <li class="nav-main-item">
                      <a class="nav-main-link" href="/module">
                          <i class="nav-main-link-icon fa fa-globe"></i>
                          <span class="nav-main-link-name">Modulo Empresarial</span>
                      </a>
                  </li>
                      </span>
              @endif
              @endif

          </ul>
        </div>
        <!-- END Side Navigation -->
      </div>
      <!-- END Sidebar Scrolling -->
    </nav>
    <!-- END Sidebar -->

    <!-- Header -->
    <header id="page-header">
      <!-- Header Content -->
      <div class="content-header">
        <!-- Left Section -->
        <div class="space-x-1">
          <!-- Toggle Sidebar -->
          <!-- Layout API, functionality initialized in Template._uiApiLayout()-->
          <button type="button" class="btn btn-alt-secondary" data-toggle="layout" data-action="sidebar_toggle">
            <i class="fa fa-fw fa-bars"></i>
          </button>
          <!-- END Toggle Sidebar -->

          <!-- Open Search Section -->
          <!-- Layout API, functionality initialized in Template._uiApiLayout() -->

          <!-- END Open Search Section -->
        </div>
        <!-- END Left Section -->

        <!-- Right Section -->
        <div class="space-x-1">
          <!-- User Dropdown -->
          <div class="dropdown d-inline-block">
            <button type="button" value="{{ \Illuminate\Support\Facades\Auth::user('name') }}" class="btn btn-alt-secondary" id="page-header-user-dropdown" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <i class="fa fa-fw fa-user d-sm-none"></i>
              <span class="d-none d-sm-inline-block">{{ auth()->user()->name}}</span>
              <i class="fa fa-fw fa-angle-down opacity-50 ms-1 d-none d-sm-inline-block"></i>
            </button>
            <div class="dropdown-menu dropdown-menu-end p-0" aria-labelledby="page-header-user-dropdown">
              <div class="bg-primary-dark rounded-top fw-semibold text-white text-center p-3">
                Opciones
              </div>
              <div class="p-2">
                  <!--<a class="dropdown-item" href="javascript:void(0)">
                    <i class="far fa-fw fa-user me-1"></i> Profile
                  </a>
                  <a class="dropdown-item d-flex align-items-center justify-content-between" href="javascript:void(0)">
                    <span><i class="far fa-fw fa-envelope me-1"></i> Inbox</span>
                    <span class="badge bg-primary rounded-pill">3</span>
                  </a>
                  <a class="dropdown-item" href="javascript:void(0)">
                    <i class="far fa-fw fa-file-alt me-1"></i> Invoices
                  </a>
                  <div role="separator" class="dropdown-divider"></div>-->

                  <!-- Toggle Side Overlay -->
                <!-- Layout API, functionality initialized in Template._uiApiLayout() -->
                <!--<a class="dropdown-item" href="javascript:void(0)" data-toggle="layout" data-action="side_overlay_toggle">
                  <i class="far fa-fw fa-building me-1"></i> Settings
                </a>-->
                <!-- END Side Overlay -->
                  <div role="separator" class="dropdown-divider"></div>
                  <a class="dropdown-item" href="/pass">
                      <i class="me-1"></i> Cambiar contrase??a
                  </a>
                <div role="separator" class="dropdown-divider"></div>
                <a class="dropdown-item" href="/logout">
                  <i class="far fa-fw fa-arrow-alt-circle-left me-1"></i> Desconectarse
                </a>
              </div>
            </div>
          </div>
          <!-- END User Dropdown -->

          <!-- Notifications Dropdown
          <div class="dropdown d-inline-block">
            <button type="button" class="btn btn-alt-secondary" id="page-header-notifications-dropdown" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <i class="fa fa-fw fa-bell"></i>
            </button>
            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-end p-0" aria-labelledby="page-header-notifications-dropdown">
              <div class="bg-primary-dark rounded-top fw-semibold text-white text-center p-3">
                Notifications
              </div>
              <ul class="nav-items my-2">
                <li>
                  <a class="d-flex text-dark py-2" href="javascript:void(0)">
                    <div class="flex-shrink-0 mx-3">
                      <i class="fa fa-fw fa-check-circle text-success"></i>
                    </div>
                    <div class="flex-grow-1 fs-sm pe-2">
                      <div class="fw-semibold">App was updated to v5.6!</div>
                      <div class="text-muted">3 min ago</div>
                    </div>
                  </a>
                </li>
                <li>
                  <a class="d-flex text-dark py-2" href="javascript:void(0)">
                    <div class="flex-shrink-0 mx-3">
                      <i class="fa fa-fw fa-user-plus text-info"></i>
                    </div>
                    <div class="flex-grow-1 fs-sm pe-2">
                      <div class="fw-semibold">New Subscriber was added! You now have 2580!
                      </div>
                      <div class="text-muted">10 min ago</div>
                    </div>
                  </a>
                </li>
                <li>
                  <a class="d-flex text-dark py-2" href="javascript:void(0)">
                    <div class="flex-shrink-0 mx-3">
                      <i class="fa fa-fw fa-times-circle text-danger"></i>
                    </div>
                    <div class="flex-grow-1 fs-sm pe-2">
                      <div class="fw-semibold">Server backup failed to complete!</div>
                      <div class="text-muted">30 min ago</div>
                    </div>
                  </a>
                </li>
                <li>
                  <a class="d-flex text-dark py-2" href="javascript:void(0)">
                    <div class="flex-shrink-0 mx-3">
                      <i class="fa fa-fw fa-exclamation-circle text-warning"></i>
                    </div>
                    <div class="flex-grow-1 fs-sm pe-2">
                      <div class="fw-semibold">You are running out of space. Please consider
                        upgrading your plan.</div>
                      <div class="text-muted">1 hour ago</div>
                    </div>
                  </a>
                </li>
                <li>
                  <a class="d-flex text-dark py-2" href="javascript:void(0)">
                    <div class="flex-shrink-0 mx-3">
                      <i class="fa fa-fw fa-plus-circle text-primary"></i>
                    </div>
                    <div class="flex-grow-1 fs-sm pe-2">
                      <div class="fw-semibold">New Sale! + $30</div>
                      <div class="text-muted">2 hours ago</div>
                    </div>
                  </a>
                </li>
              </ul>
              <div class="p-2 border-top">
                <a class="btn btn-alt-primary w-100 text-center" href="javascript:void(0)">
                  <i class="fa fa-fw fa-eye opacity-50 me-1"></i> View All
                </a>
              </div>
            </div>
          </div>
           END Notifications Dropdown -->

          <!-- Toggle Side Overlay -->
          <!-- Layout API, functionality initialized in Template._uiApiLayout() -->

          <!-- END Toggle Side Overlay -->
        </div>
        <!-- END Right Section -->
      </div>
      <!-- END Header Content -->

      <!-- Header Search
      <div id="page-header-search" class="overlay-header bg-header-dark">
        <div class="content-header">
          <form class="w-100" action="/dashboard" method="POST">
            @csrf
            <div class="input-group">
               Layout API, functionality initialized in Template._uiApiLayout()
              <button type="button" class="btn btn-alt-primary" data-toggle="layout" data-action="header_search_off">
                <i class="fa fa-fw fa-times-circle"></i>
              </button>
              <input type="text" class="form-control border-0" placeholder="Search or hit ESC.." id="page-header-search-input" name="page-header-search-input">
            </div>
          </form>
        </div>
      </div>
       END Header Search -->

      <!-- Header Loader -->
      <!-- Please check out the Loaders page under Components category to see examples of showing/hiding it -->
      <!--<div id="page-header-loader" class="overlay-header bg-header-dark">
        <div class="bg-white-10">
          <div class="content-header">
            <div class="w-100 text-center">
              <i class="fa fa-fw fa-sun fa-spin text-white"></i>
            </div>
          </div>
        </div>
      </div>-->
      <!-- END Header Loader -->
    </header>
    <!-- END Header -->

    <!-- Main Container -->
    <main id="main-container">
      @yield('content')
    </main>
    <!-- END Main Container -->

    <!-- Footer -->
    <footer id="page-footer" class="bg-body-light">
      <div class="content py-0">
          <!--<div class="row fs-sm">
            <div class="col-sm-6 order-sm-2 mb-1 mb-sm-0 text-center text-sm-end">
              Crafted with <i class="fa fa-heart text-danger"></i> by <a class="fw-semibold" href="https://1.envato.market/ydb" target="_blank">pixelcave</a>
            </div>
            <div class="col-sm-6 order-sm-1 text-center text-sm-start">
              <a class="fw-semibold" href="https://1.envato.market/r6y" target="_blank">Dashmix</a> &copy;
              <span data-toggle="year-copy"></span>
            </div>-->
        </div>

    </footer>
    <!-- END Footer -->
  </div>
  <!-- END Page Container -->

  <!-- Dashmix Core JS -->
  <script src="{{ mix('js/dashmix.app.js') }}"></script>

  <!-- Laravel Original JS -->
  <!-- <script src="{{ mix('/js/laravel.app.js') }}"></script> -->

  @yield('js_after')
</body>

</html>
