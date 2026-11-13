
@extends('layout.admin')

@section('titulo', 'Editar Empleado')

@section('contenido')

<h1 class="h3 mb-4">Editar Empleado</h1>

<div class="card shadow-sm mb-4">

    <div class="card-header">
        <i class="bi bi-pencil-square"></i>
        Editar: {{ $empleado->nombre }} {{ $empleado->apellido }}
    </div>

    <div class="card-body">

        <form action="{{ route('empleados.update', $empleado->id) }}"
              method="POST">

            @csrf
            @method('PUT')

            <div class="row">

                <div class="col-md-6 mb-3">
                    <label for="identidad" class="form-label">
                        DNI *
                    </label>

                    <input type="text"
                           name="identidad"
                           id="identidad"
                           maxlength="13"
                           pattern="[0-9]{13}"
                           class="form-control @error('identidad') is-invalid @enderror"
                           value="{{ old('identidad', $empleado->identidad) }}"
                           required>

                    <div class="form-text">
                        Exactamente 13 dígitos numéricos, sin guiones.
                    </div>

                    @error('identidad')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="col-md-6 mb-3">
                    <label for="nombre" class="form-label">
                        Nombre *
                    </label>

                    <input type="text"
                           name="nombre"
                           id="nombre"
                           class="form-control @error('nombre') is-invalid @enderror"
                           value="{{ old('nombre', $empleado->nombre) }}"
                           required>

                    @error('nombre')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="col-md-6 mb-3">
                    <label for="apellido" class="form-label">
                        Apellido *
                    </label>

                    <input type="text"
                           name="apellido"
                           id="apellido"
                           class="form-control @error('apellido') is-invalid @enderror"
                           value="{{ old('apellido', $empleado->apellido) }}"
                           required>

                    @error('apellido')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="col-md-6 mb-3">
                    <label for="correo" class="form-label">
                        Correo Electrónico *
                    </label>

                    <input type="email"
                           name="correo"
                           id="correo"
                           class="form-control @error('correo') is-invalid @enderror"
                           value="{{ old('correo', $empleado->correo) }}"
                           required>

                    @error('correo')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="col-md-6 mb-3">
                    <label for="cargo" class="form-label">
                        Cargo *
                    </label>

                    <select name="cargo"
                            id="cargo"
                            class="form-select @error('cargo') is-invalid @enderror"
                            required>

                        <option value="">Seleccione un cargo</option>

                        @foreach([
                            'Regente Farmacéutico',
                            'Asistente de Farmacia',
                            'Jefe de Bodega',
                            'Despachador',
                            'Cajero'
                        ] as $cargo)

                            <option value="{{ $cargo }}"
                                @selected(old('cargo', $empleado->cargo) == $cargo)>
                                {{ $cargo }}
                            </option>

                        @endforeach
                    </select>

                    @error('cargo')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="col-md-6 mb-3">
                    <label for="salario" class="form-label">
                        Salario Mensual (L) *
                    </label>

                    <input type="number"
                           name="salario"
                           id="salario"
                           step="0.01"
                           min="0.01"
                           max="99999999.99"
                           class="form-control @error('salario') is-invalid @enderror"
                           value="{{ old('salario', $empleado->salario) }}"
                           required>

                    <div class="form-text">
                        Sueldo base mensual, mayor que cero,
                        con máximo dos decimales.
                    </div>

                    @error('salario')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="col-md-6 mb-3">
                    <label for="fecha_ingreso" class="form-label">
                        Fecha de Ingreso *
                    </label>

                    <input type="date"
                           name="fecha_ingreso"
                           id="fecha_ingreso"
                           class="form-control @error('fecha_ingreso') is-invalid @enderror"
                           value="{{ old('fecha_ingreso', $empleado->fecha_ingreso) }}"
                           required>

                    @error('fecha_ingreso')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="col-md-6 mb-3">
                    <label for="estado" class="form-label">
                        Estado *
                    </label>

                    <select name="estado"
                            id="estado"
                            class="form-select @error('estado') is-invalid @enderror"
                            required>

                        <option value="">Seleccione un estado</option>

                        @foreach(['Activo', 'Inactivo'] as $estado)

                            <option value="{{ $estado }}"
                                @selected(old('estado', $empleado->estado) == $estado)>
                                {{ $estado }}
                            </option>

                        @endforeach

                    </select>

                    @error('estado')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

            </div>

            <div class="d-flex justify-content-end gap-2">

                <a href="{{ route('empleados.index') }}"
                   class="btn btn-secondary">
                    Cancelar
                </a>

                <button type="submit" class="btn btn-warning">
                    <i class="bi bi-save"></i>
                    Actualizar Empleado
                </button>

            </div>

        </form>
    </div>
</div>

@endsection
