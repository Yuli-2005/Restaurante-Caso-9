<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sabor Casero | Nueva Reserva</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body { background-color: #f4f7f6; font-family: 'Segoe UI', sans-serif; }
        .card-create { border: none; border-radius: 15px; box-shadow: 0 10px 30px rgba(0,0,0,0.05); }
        .form-label { font-weight: 600; color: #2c3e50; font-size: 0.9rem; }
        .form-control { border-radius: 8px; padding: 12px; border: 1px solid #dee2e6; transition: 0.3s; }
        .form-control:focus { border-color: #e67e22; box-shadow: 0 0 0 0.25rem rgba(230, 126, 34, 0.1); }
        .btn-save { background-color: #e67e22; color: white; font-weight: 600; border-radius: 8px; padding: 12px; border: none; transition: 0.3s; }
        .btn-save:hover { background-color: #d35400; color: white; }
        .btn-back { border-radius: 8px; padding: 12px; font-weight: 600; }
        .header-title { color: #2c3e50; font-weight: 700; }
        .accent-bar { height: 5px; background: #e67e22; border-radius: 15px 15px 0 0; }
    </style>
</head>
<body>

    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-12 col-md-8 col-lg-6">
                
                <div class="mb-4 d-flex align-items-center justify-content-between">
                    <h2 class="header-title mb-0">   Nueva Reserva</h2>
                    <a href="{{ route('reservaciones.index') }}" class="btn btn-link text-decoration-none text-secondary">Cancelar</a>
                </div>

                <div class="card card-create">
                    <div class="accent-bar"></div>
                    <div class="card-body p-4 p-md-5">
                        <form action="{{ route('reservaciones.store') }}" method="POST">
                            @csrf
                            
                            <input type="hidden" name="estado" value="confirmada">

                            <div class="mb-4">
                                <label class="form-label">Nombre del Cliente</label>
                                <input type="text" name="nombre_cliente" class="form-control" placeholder="Ej. Juan Pérez" required>
                            </div>

                            <div class="mb-4">
                                <label class="form-label">Teléfono de Contacto</label>
                                <input type="text" name="telefono" class="form-control" placeholder="0987654321" required>
                            </div>

                            <div class="row mb-4">
                                <div class="col-6">
                                    <label class="form-label">N° Personas</label>
                                    <input type="number" name="numero_personas" class="form-control" min="1" placeholder="Cant." required>
                                </div>
                                <div class="col-6">
                                    <label class="form-label">Hora</label>
                                    <input type="time" name="hora" class="form-control" required>
                                </div>
                            </div>

                            <div class="mb-5">
                                <label class="form-label">Fecha de la Reserva</label>
                                <input type="date" name="fecha" class="form-control" required>
                            </div>

                            <div class="d-grid gap-2">
                                <button type="submit" class="btn btn-save">Guardar Reservación</button>
                                <a href="{{ route('reservaciones.index') }}" class="btn btn-light btn-back text-secondary">Regresar al listado</a>
                            </div>
                        </form>
                    </div>
                </div>
                
                <p class="text-center mt-4 text-muted small">
                    Asegúrese de confirmar los datos con el cliente antes de guardar.
                </p>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>