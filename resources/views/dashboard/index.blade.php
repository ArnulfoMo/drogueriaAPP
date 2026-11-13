@extends('layout.admin')

@section('titulo', 'Dashboard Gerencial')

@section('contenido')

<div class="d-flex justify-content-between align-items-center mb-4">
    <div>
        <h1 class="h3 mb-1">Dashboard Gerencial</h1>
        <p class="text-muted mb-0">
            Indicadores clave del sistema DISFARMA Honduras.
        </p>
    </div>
</div>


<div class="card shadow-sm mb-4">
    <div class="card-header">
        <i class="bi bi-bar-chart-line me-1"></i>
        Resumen General
    </div>
    <div class="card-body">
        <p class="mb-2">
            Bienvenido al panel gerencial de <strong>DISFARMA Honduras</strong>.
        </p>
    </div>
</div>



<div class="row">

    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-start border-primary border-4 shadow-sm h-100">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <div class="text-xs fw-bold text-primary text-uppercase mb-1">
                            Total de Medicamentos
                        </div>
                        <div class="h4 mb-0 fw-bold text-gray-800">
                            {{ $totalMedicamentos }}
                        </div>
                    </div>
                    <div class="fs-2 text-primary">
                        <i class="bi bi-capsule"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-start border-success border-4 shadow-sm h-100">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <div class="text-xs fw-bold text-success text-uppercase mb-1">
                            Proveedores Activos
                        </div>
                        <div class="h4 mb-0 fw-bold text-gray-800">
                            {{ $totalProveedoresActivos }}
                        </div>
                    </div>
                    <div class="fs-2 text-success">
                        <i class="bi bi-truck"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-start border-warning border-4 shadow-sm h-100">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <div class="text-xs fw-bold text-warning text-uppercase mb-1">
                            Total de Empleados
                        </div>
                        <div class="h4 mb-0 fw-bold text-gray-800">
                            {{ $totalEmpleados }}
                        </div>
                    </div>
                    <div class="fs-2 text-warning">
                        <i class="bi bi-people"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-start border-info border-4 shadow-sm h-100">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <div class="text-xs fw-bold text-info text-uppercase mb-1">
                            Valor del Inventario
                        </div>
                        <div class="h4 mb-0 fw-bold text-gray-800">
                            L. {{ number_format($valorInventario, 2) }}
                        </div>
                    </div>
                    <div class="fs-2 text-info">
                        <i class="bi bi-cash-stack"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>


@endsection