<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>@yield('titulo', 'Panel') | DISFARMA Honduras</title>

    <link href="{{ asset('sb_admin/css/styles.css') }}" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">

    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js"
            crossorigin="anonymous"></script>
</head>

<body class="sb-nav-fixed">

<nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
    <a class="navbar-brand ps-3 brand-mark" href="{{ route('dashboard') }}">
        <i class="bi bi-capsule-pill me-2 text-info"></i>
        DISFARMA
    </a>

    <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0"
            id="sidebarToggle" type="button">
        <i class="fas fa-bars"></i>
    </button>

    <div class="ms-auto text-white small d-none d-sm-block">
        {{ Auth::user()->name }}
    </div>

    <form action="{{ route('logout') }}" method="POST" class="mx-3">
        @csrf
        <button class="btn btn-outline-light btn-sm" type="submit">
            <i class="bi bi-box-arrow-right"></i>
            Cerrar sesión
        </button>
    </form>
</nav>

<div id="layoutSidenav">

    <div id="layoutSidenav_nav">
        <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">

            <div class="sb-sidenav-menu">
                <div class="nav">

                    <div class="sb-sidenav-menu-heading">
                        Administración
                    </div>

                    <a class="nav-link"
                       href="{{ route('dashboard') }}">
                        <div class="sb-nav-link-icon">
                            <i class="bi bi-speedometer2"></i>
                        </div>
                        Dashboard
                    </a>

                    <a class="nav-link"
                       href="{{ route('medicamentos.index') }}">
                        <div class="sb-nav-link-icon">
                            <i class="bi bi-capsule"></i>
                        </div>
                        Medicamentos
                    </a>

                    <a class="nav-link"
                       href="{{ route('proveedores.index') }}">
                        <div class="sb-nav-link-icon">
                            <i class="bi bi-truck"></i>
                        </div>
                        Proveedores
                    </a>

                    <a class="nav-link"
                       href="{{ route('empleados.index') }}">
                        <div class="sb-nav-link-icon">
                            <i class="bi bi-people"></i>
                        </div>
                        Empleados
                    </a>

                </div>
            </div>

            <div class="sb-sidenav-footer">
                <div class="small">Conectado como:</div>
                {{ Auth::user()->name }}
            </div>

        </nav>
    </div>

    <div id="layoutSidenav_content">

        <main class="container-fluid px-4 py-4">

            @if(session('success'))
                <div class="alert alert-success alert-dismissible fade show">
                    {{ session('success') }}
                    <button class="btn-close" data-bs-dismiss="alert" type="button"></button>
                </div>
            @endif

            @yield('contenido')

        </main>

        <footer class="py-4 bg-light mt-auto">
            <div class="container-fluid px-4">
                <div class="small text-muted">
                    © 2026 DISFARMA Honduras · Gestión Farmacéutica
                </div>
                <div class="small text-muted">
                    ISC-305 Programación Web | UNAH III PAC 2026
                </div>
            </div>
        </footer>

    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script src="{{ asset('sb_admin/js/scripts.js') }}"></script>

</body>
</html>