<div>
    <h3>TAREAS</h3>

    <!-- TARJETAS RESUMEN -->
    <div class="row g-3">
        <div class="col-sm-3 d-flex">
            <div class="card h-100 w-100">
                <div class="card-body p-2">
                    <h4 class="card-title">Tareas pendientes</h4>
                    <p class="card-text">{{ $pendientes }}</p>
                </div>
            </div>
        </div>

        <div class="col-sm-3 d-flex">
            <div class="card h-100 w-100">
                <div class="card-body">
                    <h4 class="card-title">Tareas realizadas</h4>
                    <p class="card-text">{{ $completas }}</p>
                </div>
            </div>
        </div>

        <div class="col-sm-3 d-flex">
            <div class="card h-100 w-100">
                <div class="card-body">
                    <h4 class="card-title">Tareas totales</h4>
                    <p class="card-text">{{ $totales }}</p>
                </div>
            </div>
        </div>
    </div>

    <!-- TABLA DE TAREAS -->
    <div class="table-responsive mt-4">
        <table class="table">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Nombre</th>
                    <th>Descripción</th>
                    <th>Estado</th>
                    <th>Creación</th>
                    <th>Equipo</th>
                    <th>Acción</th>
                    <th>Mensaje</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($tareas as $tarea)
                    <tr>
                        <td>{{ $tarea->id }}</td>
                        <td>{{ $tarea->nombre }}</td>
                        <td>{{ $tarea->descripcion }}</td>

                        <td>
                            @if ($tarea->estado === 1)
                                <span class="badge bg-success">Completado</span>
                            @else
                                <span class="badge bg-warning">Incompleto</span>
                            @endif
                        </td>

                        <td>{{ $tarea->created_at }}</td>
                        <td>{{ $tarea->equipo_id }}</td>

                        <td>
                            <a href="{{ route('gestionar.tarea.view',['tarea'=>$tarea->id]) }}" 
                               class="btn btn-primary btn-sm">Gestionar</a>
                        </td>

                        <!-- BOTÓN PARA VER MENSAJE -->
                        <td>
                            <button 
                                type="button" 
                                class="btn btn-info btn-sm verMensajeBtn"
                                data-bs-toggle="modal" 
                                data-bs-target="#modalMensaje"
                                data-mensaje="{{ $tarea->mensaje }}"
                                data-titulo="Mensaje de la tarea #{{ $tarea->id }}"
                            >
                                Ver Mensaje
                            </button>
                        </td>

                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    {{ $tareas->links() }}

    <!-- MODAL -->
    <div class="modal fade" id="modalMensaje" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">

                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="modalTitulo">Mensaje</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>

                <div class="modal-body" id="contenedorMensaje">
                    <!-- Se llena dinámicamente -->
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                        Cerrar
                    </button>
                </div>

            </div>
        </div>
    </div>
</div>

<!-- SCRIPT PARA PASAR DATOS AL MODAL -->
<script>
document.addEventListener('DOMContentLoaded', () => {
    const botones = document.querySelectorAll('.verMensajeBtn');
    const contenedor = document.getElementById('contenedorMensaje');
    const titulo = document.getElementById('modalTitulo');

    botones.forEach(boton => {
        boton.addEventListener('click', () => {
            const mensaje = boton.getAttribute('data-mensaje');
            const tituloModal = boton.getAttribute('data-titulo');

            titulo.textContent = tituloModal;
            contenedor.textContent = mensaje ? mensaje : "Sin mensaje.";
        });
    });
});
</script>
