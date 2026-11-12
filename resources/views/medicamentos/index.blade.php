
@extends('layout.admin')

@section('titulo', 'Catálogo de Medicamentos')

@section('contenido')

<div class="d-flex justify-content-between align-items-center mb-4">
    <div>
        <h1 class="h3 mb-1">Catálogo de Medicamentos</h1>
        <p class="text-muted mb-0">
            Gestión del inventario farmacéutico.
        </p>
    </div>

    <a href="{{ route('medicamentos.create') }}" class="btn btn-primary">
        <i class="bi bi-plus-circle"></i>
        Nuevo Medicamento
    </a>
</div>

<div class="card shadow-sm mb-4">

    <div class="card-header">
        <i class="bi bi-capsule me-1"></i>
        Inventario de Medicamentos
    </div>

    <div class="card-body">

        <form action="{{ route('medicamentos.index') }}" method="GET" class="row g-2 mb-4">

            <div class="col-md-5">
                <input type="text"
                       name="buscar"
                       class="form-control"
                       placeholder="Buscar por nombre o SKU..."
                       value="{{ request('buscar') }}">
            </div>

            <div class="col-auto">
                <button type="submit" class="btn btn-primary">
                    <i class="bi bi-search"></i>
                    Buscar
                </button>
            </div>

            <div class="col-auto">
                <a href="{{ route('medicamentos.index') }}"
                   class="btn btn-secondary">
                    Limpiar
                </a>
            </div>

        </form>

        <div class="table-responsive">

            <table class="table table-bordered table-hover align-middle">

                <thead class="table-dark">
                    <tr>
                        <th>Fotografía</th>
                        <th>SKU</th>
                        <th>Nombre</th>
                        <th>Categoría</th>
                        <th>Precio</th>
                        <th>Inventario</th>
                        <th>Estado</th>
                        <th>Acciones</th>
                    </tr>
                </thead>

                <tbody>

                    @forelse($medicamentos as $medicamento)

                        <tr>

                            <td class="text-center">

                                @if($medicamento->imagen)
                                    <img src="{{ asset('storage/' . $medicamento->imagen) }}"
                                         alt="{{ $medicamento->nombre }}"
                                         class="img-thumbnail"
                                         style="width: 65px; height: 65px; object-fit: cover;">
                                @else
                                    <span class="text-muted">
                                        Sin fotografía
                                    </span>
                                @endif

                            </td>

                            <td>{{ $medicamento->codigo }}</td>

                            <td>{{ $medicamento->nombre }}</td>

                            <td>{{ $medicamento->categoria }}</td>

                            <td>
                                L {{ number_format($medicamento->precio, 2) }}
                            </td>

                            <td class="text-center">
                                {{ $medicamento->inventario }}
                            </td>

                            <td>

                                @if($medicamento->inventario > 20)
                                    <span class="badge bg-success">
                                        Óptimo
                                    </span>

                                @elseif($medicamento->inventario >= 10)
                                    <span class="badge bg-warning text-dark">
                                        Moderado
                                    </span>

                                @else
                                    <span class="badge bg-danger">
                                        ¡Desabastecimiento!
                                    </span>
                                @endif

                            </td>

                            <td>

                                <div class="d-flex gap-2">

                                    <a href="{{ route('medicamentos.edit', $medicamento->id) }}"
                                       class="btn btn-warning btn-sm">
                                        <i class="bi bi-pencil-square"></i>
                                        Editar
                                    </a>

                                    <form action="{{ route('medicamentos.destroy', $medicamento->id) }}"
                                          method="POST"
                                          onsubmit="return confirm('¿Estás seguro de eliminar este medicamento?')">

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
                            <td colspan="8"
                                class="text-center text-muted py-4">
                                No se encontraron medicamentos.
                            </td>
                        </tr>

                    @endforelse

                </tbody>

            </table>

        </div>

        <div class="mt-3">
            {{ $medicamentos->links('pagination::bootstrap-5') }}
        </div>

    </div>

</div>

@endsection
