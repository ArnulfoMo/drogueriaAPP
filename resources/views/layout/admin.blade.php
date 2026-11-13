
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>@yield('titulo', 'Panel') | DISFARMA Honduras</title>

    <!-- Estilos -->
    <link href="{{ asset('sb_admin/css/styles.css') }}" rel="stylesheet">
    <link href="{{ asset('sb_admin/css/custom.css') }}" rel="stylesheet">

    <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css"
          rel="stylesheet">

    <!-- Font Awesome -->
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js"
            crossorigin="anonymous"></script>
</head>

<body class="sb-nav-fixed">

    <!-- barra superor -->
    <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">

        <!-- Logo -->
        <a class="navbar-brand ps-3 brand-mark"
           href="{{ route('dashboard') }}">
            <i class="bi bi-capsule-pill me-2 text-info"></i>
            DISFARMA
        </a>

        <!-- boton menu lateral -->
        <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0"
                id="sidebarToggle"
                type="button"
                aria-label="Mostrar u ocultar menú">
            <i class="fas fa-bars"></i>
        </button>

        <!-- Usuario autenticado -->
        <div class="ms-auto d-none d-md-flex align-items-center text-white gap-2">

            <i class="bi bi-person-circle fs-4 text-info"></i>

            <div class="small">
                <div class="text-white-50">
                    Usuario conectado
                </div>

                <div class="fw-semibold">
                    {{ Auth::user()->name }}
                </div>
            </div>

        </div>

        <!-- Cerrar sesión -->
        <form action="{{ route('logout') }}"
              method="POST"
              class="mx-3">

            @csrf

            <button class="btn btn-outline-light btn-sm px-3"
                    type="submit">

                <i class="bi bi-box-arrow-right me-1"></i>
                <span class="d-none d-sm-inline">Cerrar sesión</span>

            </button>

        </form>

    </nav>


    <div id="layoutSidenav">

        <!-- menu lateral -->
        <div id="layoutSidenav_nav">

            <nav class="sb-sidenav accordion sb-sidenav-dark"
                 id="sidenavAccordion">

                <div class="sb-sidenav-menu">

                    <div class="nav">

                        <!-- Encabezado -->
                        <div class="sb-sidenav-menu-heading text-white">
                            Administración
                        </div>

                        <!-- Dashboard -->
                        <a class="nav-link {{ request()->routeIs('dashboard') ? 'active' : '' }}"
                           href="{{ route('dashboard') }}">

                            <div class="sb-nav-link-icon">
                                <i class="bi bi-speedometer2"></i>
                            </div>

                            Dashboard

                        </a>

                        <!-- Medicamentos -->
                        <a class="nav-link {{ request()->routeIs('medicamentos.*') ? 'active' : '' }}"
                           href="{{ route('medicamentos.index') }}">

                            <div class="sb-nav-link-icon">
                                <i class="bi bi-capsule"></i>
                            </div>

                            Medicamentos

                        </a>

                        <!-- Proveedores -->
                        <a class="nav-link {{ request()->routeIs('proveedores.*') ? 'active' : '' }}"
                           href="{{ route('proveedores.index') }}">

                            <div class="sb-nav-link-icon">
                                <i class="bi bi-truck"></i>
                            </div>

                            Proveedores

                        </a>

                        <!-- Empleados -->
                        <a class="nav-link {{ request()->routeIs('empleados.*') ? 'active' : '' }}"
                           href="{{ route('empleados.index') }}">

                            <div class="sb-nav-link-icon">
                                <i class="bi bi-people"></i>
                            </div>

                            Empleados

                        </a>

                    </div>

                </div>


                <!-- Pie del menu lateral -->
                <div class="sb-sidenav-footer">

                    <div class="small">
                        Conectado como:
                    </div>

                    <div class="fw-semibold">
                        <i class="bi bi-person-circle me-1"></i>
                        {{ Auth::user()->name }}
                    </div>

                </div>

            </nav>

        </div>


        <!-- Principal contenidos -->
        <div id="layoutSidenav_content">

            <main class="container-fluid px-4 py-4">

                <!-- Mensaje de exito -->
                @if(session('success'))

                    <div class="alert alert-success alert-dismissible fade show"
                         role="alert">

                        <i class="bi bi-check-circle-fill me-2"></i>

                        {{ session('success') }}

                        <button type="button"
                                class="btn-close"
                                data-bs-dismiss="alert"
                                aria-label="Cerrar">
                        </button>

                    </div>

                @endif

                
                @yield('contenido')

            </main>


            <!-- Footer -->
            <footer class="py-4 bg-light mt-auto">

                <div class="container-fluid px-4">

                    <div class="d-flex flex-column flex-md-row
                                justify-content-between align-items-md-center gap-2">

                        <div class="small text-muted">
                            © 2026 DISFARMA Honduras · Gestión Farmacéutica
                        </div>

                        <div class="small text-muted">
                            ISC-305 Programación Web | UNAH III PAC 2026
                        </div>

                    </div>

                </div>

            </footer>

        </div>

    </div>



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('sb_admin/js/scripts.js') }}"></script>

</body>
</html>
