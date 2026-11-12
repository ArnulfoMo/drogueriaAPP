<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Registro | DISFARMA</title>
    <link href="{{ asset('sb_admin/css/styles.css') }}" rel="stylesheet">
</head>

<body class="bg-primary">
<div id="layoutAuthentication">
    <div id="layoutAuthentication_content">
        <main class="container">
            <div class="row justify-content-center">
                <div class="col-lg-6">
                    <div class="card shadow-lg border-0 mt-5">

                        <div class="card-header bg-dark text-white text-center py-3">
                            <h3>Registro DISFARMA</h3>
                        </div>

                        <div class="card-body p-4">

                            @if($errors->any())
                                <div class="alert alert-danger">
                                    <ul class="mb-0">
                                        @foreach($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif

                            <form method="POST" action="{{ route('register.post') }}">
                                @csrf

                                <div class="mb-3">
                                    <label for="name" class="form-label">Nombre completo</label>
                                    <input
                                        class="form-control @error('name') is-invalid @enderror"
                                        id="name"
                                        name="name"
                                        value="{{ old('name') }}"
                                        required
                                    >
                                    @error('name')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="email" class="form-label">Correo institucional</label>
                                    <input
                                        type="email"
                                        class="form-control @error('email') is-invalid @enderror"
                                        id="email"
                                        name="email"
                                        value="{{ old('email') }}"
                                        placeholder="nombre@disfarma.hn"
                                        required
                                    >
                                    @error('email')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <label for="password" class="form-label">Contraseña</label>
                                        <input type="password" id="password"
                                               name="password" class="form-control" required>
                                    </div>

                                    <div class="col-md-6 mb-3">
                                        <label for="password_confirmation" class="form-label">
                                            Confirmar contraseña
                                        </label>
                                        <input type="password" id="password_confirmation"
                                               name="password_confirmation"
                                               class="form-control" required>
                                    </div>
                                </div>

                                <div class="d-grid">
                                    <button class="btn btn-primary" type="submit">
                                        Crear cuenta
                                    </button>
                                </div>
                            </form>
                        </div>

                        <div class="card-footer text-center">
                            <a href="{{ route('login') }}">
                                Volver al inicio de sesión
                            </a>
                        </div>

                    </div>
                </div>
            </div>
        </main>
    </div>
</div>
</body>
</html>