<div>
   <div class="row g-3">
        <div class="col-sm-3 d-flex">
            <div class="card p-5 h-100 w-100">
                <div class="card-body">
                    <h4 class="card-title">{{ $usuario->name }}</h4>
                    <p class="card-text">{{ $usuario->email }}</p>
                    <div class="avatar-small">
                        <img class="img-fluid" src="{{ asset('storage/perfiles/'.$usuario->foto) }}" alt="">
                    </div>
                </div>
            </div>
        </div>

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

    <div class="row mt-3">
        <div class="col-sm-3">
            <h4 class="mb-3">Asignar Tarea</h4>
                <button type="button" class="btn btn-success btn-sm" data-bs-toggle="modal" data-bs-target="#staticBackdropTarea">
                    Asignar Tarea
                </button>                       
        </div>        
    </div>
    <div class="container mt-5">
        <div
            class="table-responsive"
        >
            <table
                class="table"
            >
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nombre</th>
                        <th scope="col">Descripcion</th>
                        <th scope="col">Estado</th>
                        <th scope="col">Creacion</th>
                        <th scope="col">Actualizacion</th>
                        <th scope="col">Evidencia</th>
                        <th scope="col">observacion</th>
                        <th scope="col">Acs 1</th>
                        <th scope="col">Acs 2</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($tareas as $tarea )
                        <tr>
                            <td>{{$tarea->id}}</td>
                            <td>{{$tarea->nombre}}</td>
                            <td>{{$tarea->descripcion}}</td>
                            @if($tarea->estado == 0)                                
                                <td><span class="badge text-bg-warning">Incompleta</span></td>
                            @else                                
                                <td><span class="badge text-bg-success">Completada</span></td>
                            @endif
                            <td>{{$tarea->created_at}}</td>
                            <td>{{$tarea->updated_at}}</td>
                            @if($tarea->evidencia == null)
                                <td>Sin Evidencia</td>
                            @else
                                <td><a href="{{asset('storage/tareas/'.$tarea->evidencia) }}">{{$tarea->evidencia}}</a></td>
                            @endif                          
                            @if ($tarea->confirmacion === 1)
                                <td><span class="badge text-bg-success">Correcta</span></td>
                            @else
                                <td><span class="badge text-bg-warning">Complicaciones</span></td>
                            @endif  
                            <td><button class="btn btn-danger btn-sm" wire:confirm="¿Estas seguro de que desea eliminar la tarea?"
                            wire:click="designarTarea({{$tarea->id}})">Eliminar</button></td>
                            <td><button type="button"
                                class="btn btn-primary btn-sm"
                                wire:click="abrirModalValidacion({{ $tarea->id }})"
                                data-bs-toggle="modal"
                                data-bs-target="#staticBackdrop">
                                Validar
                            </button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>        
    </div>
    
    <div class="container mt-3">
        <div class="row">
            <div class="col-sm-4">
                <h4 class="card-title">Eliminar Usuario</h4>
                <p class="card-text">Esta accion no se podra revertir</p>
                <button class="btn  btn-outline-danger" wire:confirm="¿Estas seguro de que desea eliminar al usuario del grupo?"
                wire:click="eliminar">Eliminar</button>       
            </div>
        </div>        
    </div>
     <div wire:ignore class="modal fade" id="staticBackdropTarea" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="staticBackdropLabel">Modal title</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form wire:submit="asignarTarea">
                    <div class="mb-3">
                        <label for="" class="form-label">Nombre de la Tarea</label>
                        <input
                            type="text"
                            class="form-control"
                            wire:model.blur="nombreTarea"
                            id=""
                            aria-describedby="helpId"
                            placeholder="Ingrese el nombre de la tarea"
                        />
                    </div>       
                    <div class="mb-3">
                        <label for="" class="form-label">Descripcion</label>
                        <input
                            type="text"
                            wire:model.blur="descripcionTarea"
                            class="form-control"
                            id=""
                            aria-describedby="helpId"
                            placeholder="Ingrese una descripcion corta de la tarea"
                        />
                    </div>       
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                        <button type="submit" class="btn btn-primary">Crear</button>
                    </div>
                </form>
            </div>        
            </div>
        </div>
    </div>
    @script
        <script>
            document.addEventListener('tarea-asignada',event=>{
                alert('La tarea ha sido asignada!');
            });
        </script>
    @endscript
    @script
        <script>
            document.addEventListener('tarea-eliminada',event=>{
                alert('La tarea ha sido elimianda!');
            });
        </script>
    @endscript
    @script
        <script>
            document.addEventListener('validacion',event=>{
                alert('La tarea ha sido validada!');
            });
        </script>
    @endscript
    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" wire:ignore
    tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">

        <form wire:submit="validar">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="staticBackdropLabel">
                        Validar Tarea
                    </h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                        aria-label="Close"></button>
                </div>

                <div class="modal-body">
                    <label for="" class="form-label">Mensaje de validación</label>
                    <input type="text" wire:model="mensaje" class="form-control">
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                        Cerrar
                    </button>
                    <button type="submit" class="btn btn-primary">
                        Validar
                    </button>
                </div>
            </div>
        </form>

    </div>
</div>
</div>
