<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sabor Casero - Reservas</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        body { font-family: 'Poppins', sans-serif; background-color: #f4f7f6; }
        .navbar-custom { background: linear-gradient(45deg, #ff416c, #ff4b2b); color: white; border-radius: 0 0 20px 20px; }
        .card-reserva { 
            border: none; 
            border-radius: 15px; 
            transition: all 0.3s ease; 
            background: #fff;
        }
        .card-reserva:hover { transform: scale(1.02); box-shadow: 0 10px 20px rgba(0,0,0,0.1); }
        .status-badge { border-radius: 20px; padding: 5px 15px; font-size: 0.8rem; }
        
        /* Colores según estado solicitado */
        .border-confirmada { border-top: 8px solid #007bff; }
        .border-vinieron { border-top: 8px solid #28a745; }
        .border-cancelaron { border-top: 8px solid #dc3545; }
        
        .btn-add { 
            background: #ff4b2b; border: none; border-radius: 50px; 
            padding: 10px 25px; font-weight: 600; box-shadow: 0 4px 15px rgba(255, 75, 43, 0.3);
        }
        .btn-edit { border-radius: 10px; font-size: 0.9rem; }
        .icon-circle { 
            width: 40px; height: 40px; background: #eee; 
            border-radius: 50%; display: flex; align-items: center; justify-content: center;
        }
    </style>
</head>
<body>

    <nav class="navbar navbar-custom shadow-sm mb-4">
        <div class="container py-2">
            <div>
                <span class="navbar-brand mb-0 h1 text-white">Sabor Casero</span>
                <p class="small mb-0 opacity-75">¡Hola Don Miguel! Así va el día hoy.</p>
            </div>
            <a href="{{ route('reservaciones.create') }}" class="btn btn-light btn-add text-danger">
                <i class="fas fa-plus"></i> Nueva Reserva
            </a>
        </div>
    </nav>

    <div class="container">
        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show border-0 shadow-sm" role="alert" style="border-radius: 15px;">
                <strong>¡Oído cocina!</strong> {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif

        <div class="row">
            @forelse($reservaciones as $reserva)
                <div class="col-12 col-md-6 col-lg-4 mb-4">
                    <div class="card card-reserva shadow-sm h-100 {{ $reserva->estado == 'ya vinieron' ? 'border-vinieron' : ($reserva->estado == 'cancelaron' ? 'border-cancelaron' : 'border-confirmada') }}">
                        <div class="card-body">
                            <div class="d-flex justify-content-between align-items-center mb-3">
                                <div class="icon-circle text-secondary">
                                    <i class="fas fa-user"></i>
                                </div>
                                <span class="badge status-badge {{ $reserva->estado == 'ya vinieron' ? 'bg-success' : ($reserva->estado == 'cancelaron' ? 'bg-danger' : 'bg-primary') }}">
                                    {{ strtoupper($reserva->estado) }}
                                </span>
                            </div>

                            <h5 class="card-title fw-bold text-dark">{{ $reserva->nombre_cliente }}</h5>
                            
                            <div class="mt-3 text-secondary">
                                <p class="mb-1"><i class="fas fa-phone small me-2"></i> {{ $reserva->telefono }}</p>
                                <p class="mb-1"><i class="fas fa-users small me-2"></i> {{ $reserva->numero_personas }} personas</p>
                                <p class="mb-1"><i class="fas fa-clock small me-2"></i> {{ $reserva->hora }}</p>
                                <p class="mb-1"><i class="fas fa-calendar small me-2"></i> {{ $reserva->fecha->format('d/m/Y') }}</p>
                            </div>

                            <hr class="opacity-25">
                            
                            <div class="d-flex gap-2">
                                <a href="{{ route('reservaciones.edit', $reserva->id) }}" class="btn btn-outline-secondary btn-edit flex-grow-1">
                                    <i class="fas fa-edit"></i> Editar
                                </a>
                                
                                <form action="{{ route('reservaciones.destroy', $reserva->id) }}" method="POST" onsubmit="return confirm('¿Quitar de la vista? No se borrará del historial.')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-outline-danger btn-edit">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-12 text-center py-5">
                    <i class="fas fa-mug-hot fa-4x text-muted mb-3"></i>
                    <h4 class="text-muted">Don Miguel, no hay clientes anotados por ahora.</h4>
                    <p class="text-secondary">¡Tómese un café mientras espera!</p>
                </div>
            @endforelse
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>