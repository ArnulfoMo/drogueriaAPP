
@extends('layout.admin')

@section('titulo', 'Nómina y Personal')

@section('contenido')

<div class="d-flex justify-content-between align-items-center mb-4">
    <div>
        <h1 class="h3 mb-1">Nómina y Personal</h1>
        <p class="text-muted mb-0">
            Gestión del personal farmacéutico de DISFARMA.
        </p>
    </div>

    <a href="{{ route('empleados.create') }}"
       class="btn btn-primary">
        <i class="bi bi-plus-circle"></i>
        Nuevo Empleado
    </a>
</div>

<div class="card shadow-sm mb-4">

    <div class="card-header">
        <i class="bi bi-people me-1"></i>
        Listado de Empleados
    </div>

    <div class="card-body">

        <div class="table-responsive">

            <table class="table table-bordered table-hover align-middle">

                <thead class="table-dark">
                    <tr>
                        <th>DNI</th>
                        <th>Nombre</th>
                        <th>Apellido</th>
                        <th>Correo</th>
                        <th>Cargo</th>
                        <th>Salario</th>
                        <th>Fecha de Ingreso</th>
                        <th>Estado</th>
                        <th>Acciones</th>
                    </tr>
                </thead>

                <tbody>

                    @forelse($empleados as $empleado)

                        <tr>

                            <td>{{ $empleado->identidad }}</td>

                            <td>{{ $empleado->nombre }}</td>

                            <td>{{ $empleado->apellido }}</td>

                            <td>{{ $empleado->correo }}</td>

                            <td>

                                @if($empleado->cargo == 'Regente Farmacéutico')

                                    <span class="badge bg-primary">
                                        {{ $empleado->cargo }}
                                    </span>

                                @elseif($empleado->cargo == 'Asistente de Farmacia')

                                    <span class="badge bg-success">
                                        {{ $empleado->cargo }}
                                    </span>

                                @elseif($empleado->cargo == 'Jefe de Bodega')

                                    <span class="badge bg-warning text-dark">
                                        {{ $empleado->cargo }}
                                    </span>

                                @elseif($empleado->cargo == 'Despachador')

                                    <span class="badge bg-info text-dark">
                                        {{ $empleado->cargo }}
                                    </span>

                                @else

                                    <span class="badge bg-secondary">
                                        {{ $empleado->cargo }}
                                    </span>

                                @endif

                            </td>

                            <td>
                                L. {{ number_format($empleado->salario, 2) }}
                            </td>

                            <td>
                                {{ date('d/m/Y', strtotime($empleado->fecha_ingreso)) }}
                            </td>

                            <td>

                                @if($empleado->estado == 'Activo')

                                    <span class="badge bg-success">
                                        Activo
                                    </span>

                                @else

                                    <span class="badge bg-secondary">
                                        Inactivo
                                    </span>

                                @endif

                            </td>

                            <td>

                                <div class="d-flex gap-2">

                                    <a href="{{ route('empleados.edit', $empleado->id) }}"
                                       class="btn btn-warning btn-sm">

                                        <i class="bi bi-pencil-square"></i>
                                        Editar

                                    </a>

                                    <form action="{{ route('empleados.destroy', $empleado->id) }}"
                                          method="POST"
                                          onsubmit="return confirm('¿Estás seguro de eliminar este empleado?')">

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
                            <td colspan="9"
                                class="text-center text-muted py-4">
                                No hay empleados registrados.
                            </td>
                        </tr>

                    @endforelse

                </tbody>

            </table>

        </div>

        <div class="mt-3">
            {{ $empleados->links('pagination::bootstrap-5') }}
        </div>

    </div>

</div>

@endsection
