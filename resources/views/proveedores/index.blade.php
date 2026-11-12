
@extends('layout.admin')

@section('titulo', 'Catálogo de Proveedores')

@section('contenido')

<div class="d-flex justify-content-between align-items-center mb-4">
    <div>
        <h1 class="h3 mb-1">Catálogo de Proveedores</h1>
        <p class="text-muted mb-0">
            Gestión de laboratorios y proveedores mayoristas.
        </p>
    </div>

    <a href="{{ route('proveedores.create') }}"
       class="btn btn-primary">
        <i class="bi bi-plus-circle"></i>
        Nuevo Proveedor
    </a>
</div>

<div class="card shadow-sm mb-4">

    <div class="card-header">
        <i class="bi bi-truck me-1"></i>
        Listado de Proveedores
    </div>

    <div class="card-body">

        <div class="table-responsive">

            <table class="table table-bordered table-hover align-middle">

                <thead class="table-dark">
                    <tr>
                        <th>RTN</th>
                        <th>Empresa</th>
                        <th>Contacto</th>
                        <th>Teléfono</th>
                        <th>Categoría</th>
                        <th>Límite de Crédito</th>
                        <th>Días de Crédito</th>
                        <th>Estado</th>
                        <th>Fecha de Registro</th>
                        <th>Acciones</th>
                    </tr>
                </thead>

                <tbody>

                    @forelse($proveedores as $proveedor)

                        <tr>

                            <td>{{ $proveedor->rtn }}</td>

                            <td>{{ $proveedor->empresa }}</td>

                            <td>{{ $proveedor->contacto }}</td>

                            <td>{{ $proveedor->telefono }}</td>

                            <td>{{ $proveedor->categoria }}</td>

                            <td>
                                L {{ number_format($proveedor->limite_credito, 2) }}
                            </td>

                            <td>
                                <span class="badge bg-info text-dark">
                                    {{ $proveedor->dias_credito }} días
                                </span>
                            </td>

                            <td>

                                @if($proveedor->estado == 'Activo')

                                    <span class="badge bg-success">
                                        Activo
                                    </span>

                                @else

                                    <span class="badge bg-secondary">
                                        Inactivo
                                    </span>

                                @endif

                            </td>

                            <td>{{ $proveedor->fecha_registro }}</td>

                            <td>

                                <div class="d-flex gap-2">

                                    <a href="{{ route('proveedores.edit', $proveedor->id) }}"
                                       class="btn btn-warning btn-sm">
                                        <i class="bi bi-pencil-square"></i>
                                        Editar
                                    </a>

                                    <form action="{{ route('proveedores.destroy', $proveedor->id) }}"
                                          method="POST"
                                          onsubmit="return confirm('¿Estás seguro de eliminar este proveedor?')">

                                        @csrf
                                        @method('DELETE')

                                        <button type="submit"
                                                class="btn btn-danger btn-sm">
                                            <i class="bi bi-trash"></i>
                                            Eliminar
                                        </button>

                                    </form>

                                </div>

                            </td>

                        </tr>

                    @empty

                        <tr>
                            <td colspan="10"
                                class="text-center text-muted py-4">
                                No hay proveedores registrados.
                            </td>
                        </tr>

                    @endforelse

                </tbody>

            </table>

        </div>

        <div class="mt-3">
            {{ $proveedores->links('pagination::bootstrap-5') }}
        </div>

    </div>

</div>

@endsection
