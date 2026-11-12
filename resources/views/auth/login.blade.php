<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Iniciar sesión | DISFARMA</title>

    <link href="{{ asset('sb_admin/css/styles.css') }}" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">
</head>

<body class="bg-primary">
<div id="layoutAuthentication">
    <div id="layoutAuthentication_content">
        <main>
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-5">
                        <div class="card shadow-lg border-0 rounded-lg mt-5">

                            <div class="card-header bg-dark text-white text-center py-4">
                                <h3 class="my-2">
                                    <i class="bi bi-capsule-pill text-info"></i>
                                    DISFARMA Honduras
                                </h3>
                                <small>Acceso al sistema de gestion farmacéutica</small>
                            </div>

                            <div class="card-body p-4">
                                @if(session('success'))
                                    <div class="alert alert-success">
                                        {{ session('success') }}
                                    </div>
                                @endif

                                <form action="{{ route('login.post') }}" method="POST">
                                    @csrf

                                    <div class="form-floating mb-3">
                                        <input
                                            class="form-control @error('email') is-invalid @enderror"
                                            type="email"
                                            id="email"
                                            name="email"
                                            value="{{ old('email') }}"
                                            placeholder="usuario@disfarma.hn"
                                            required
                                            autofocus
                                        >
                                        <label for="email">Correo institucional (@disfarma.hn)</label>

                                        @error('email')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="form-floating mb-3">
                                        <input
                                            class="form-control @error('password') is-invalid @enderror"
                                            type="password"
                                            id="password"
                                            name="password"
                                            placeholder="Contraseña"
                                            required
                                        >
                                        <label for="password">Contraseña</label>

                                        @error('password')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="form-check mb-3">
                                        <input
                                            class="form-check-input"
                                            type="checkbox"
                                            id="remember"
                                            name="remember"
                                            value="1"
                                            {{ old('remember') ? 'checked' : '' }}
                                            >
                                        <label class="form-check-label" for="remember">
                                            Recordar mi sesión
                                        </label>
                                    </div>

                                    <div class="d-grid">
                                        <button class="btn btn-primary" type="submit">
                                            <i class="bi bi-box-arrow-in-right"></i>
                                            Ingresar
                                        </button>
                                    </div>
                                </form>
                            </div>

                            <div class="card-footer text-center">
                                <small>
                                    No tiene cuenta?
                                    <a href="{{ route('register') }}">Registrarse</a>
                                </small>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>