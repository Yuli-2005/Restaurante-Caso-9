<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sabor Casero | Editar Reserva</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body { background-color: #f4f7f6; font-family: 'Segoe UI', sans-serif; }
        .card-edit { border: none; border-radius: 15px; box-shadow: 0 10px 30px rgba(0,0,0,0.05); }
        .form-label { font-weight: 600; color: #2c3e50; font-size: 0.9rem; }
        .form-control, .form-select { border-radius: 8px; padding: 12px; border: 1px solid #dee2e6; }
        .form-control:focus { border-color: #e67e22; box-shadow: 0 0 0 0.25rem rgba(230, 126, 34, 0.1); }
        .btn-update { background-color: #2c3e50; color: white; font-weight: 600; border-radius: 8px; padding: 12px; transition: 0.3s; }
        .btn-update:hover { background-color: #1a252f; color: white; }
        .btn-cancel { border-radius: 8px; padding: 12px; font-weight: 600; }
        .header-title { color: #2c3e50; font-weight: 700; }
    </style>
</head>
<body>

    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-12 col-md-8 col-lg-6">
                
                <div class="mb-4 d-flex align-items-center justify-content-between">
                    <h2 class="header-title mb-0"> Editar Reserva</h2>
                    <a href="{{ route('reservaciones.index') }}" class="btn btn-link text-decoration-none text-secondary">Volver al listado</a>
                </div>

                <div class="card card-edit">
                    <div class="card-body p-4 p-md-5">
                        <form action="{{ route('reservaciones.update', $reservacion->id) }}" method="POST">
                            @csrf
                            @method('PUT')

                            <div class="mb-4">
                                <label class="form-label">Nombre del Cliente</label>
                                <input type="text" name="nombre_cliente" class="form-control" value="{{ $reservacion->nombre_cliente }}" required>
                            </div>

                            <div class="row mb-4">
                                <div class="col-6">
                                    <label class="form-label">Teléfono</label>
                                    <input type="text" name="telefono" class="form-control" value="{{ $reservacion->telefono }}" required>
                                </div>
                                <div class="col-6">
                                    <label class="form-label">Personas</label>
                                    <input type="number" name="numero_personas" class="form-control" value="{{ $reservacion->numero_personas }}" required>
                                </div>
                            </div>

                            <div class="row mb-4">
                                <div class="col-6">
                                    <label class="form-label">Fecha</label>
                                    <input type="date" name="fecha" class="form-control" value="{{ $reservacion->fecha }}" required>
                                </div>
                                <div class="col-6">
                                    <label class="form-label">Hora</label>
                                    <input type="time" name="hora" class="form-control" value="{{ $reservacion->hora }}" required>
                                </div>
                            </div>

                            <div class="mb-5">
                                <label class="form-label text-primary">Estado de la Reserva</label>
                                <select name="estado" class="form-select bg-light fw-bold">
                                    <option value="confirmada" {{ $reservacion->estado == 'confirmada' ? 'selected' : '' }}>🔵 Confirmada</option>
                                    <option value="ya vinieron" {{ $reservacion->estado == 'ya vinieron' ? 'selected' : '' }}>🟢 Ya vinieron</option>
                                    <option value="cancelaron" {{ $reservacion->estado == 'cancelaron' ? 'selected' : '' }}>🔴 Cancelaron</option>
                                </select>
                                <small class="text-muted mt-1 d-block">Actualice el estado según llegue el cliente.</small>
                            </div>

                            <div class="d-grid gap-2">
                                <button type="submit" class="btn btn-update">Guardar Cambios</button>
                                <a href="{{ route('reservaciones.index') }}" class="btn btn-light btn-cancel">Descartar</a>
                            </div>
                        </form>
                    </div>
                </div>
                
                <p class="text-center mt-4 text-muted small">Sabor Casero - Sistema Administrativo v1.0</p>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>