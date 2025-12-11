<div>
    <div class="row">
        <div class="col-sm-4">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Crear equipo</h4>
                    <p class="card-text">Cree un nuevo equipo y integre a sus mejores talentos</p>
                         <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                            Crear Equipo
                        </button>                   
                </div>
            </div>            
        </div>
        <div class="col-sm-4">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Equipos</h4>
                    <p class="card-text">Cantidad de equipos a los que pertences</p>
                         <button type="button" class="btn btn-primary btn-md" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                            {{$equipos}}
                        </button>                   
                </div>
            </div>            
        </div>
        <div class="col-sm-4">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Tareas</h4>
                    <p class="card-text">Cantidad de  tareas que tienes pendientes</p>
                         <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                            {{$tareas}}
                        </button>                   
                </div>
            </div>            
        </div>
    </div>

    <!-- Modal -->
    <div wire:ignore class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="staticBackdropLabel">Modal title</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form wire:submit="crearEquipo">
                    <div class="mb-3">
                        <label for="" class="form-label">Nombre del Grupo</label>
                        <input
                            type="text"
                            class="form-control @error('equipoForm.nombre') is-invalid @enderror"
                            wire:model.blur="equipoForm.nombre"
                            id=""
                            aria-describedby="helpId"
                            placeholder="Ingrese el nombre del equipo"
                        />
                        @error('equipoForm.nombre')
                            <label for="" class="text-danger">{{$message}}</label>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Descripcion del Grupo</label>
                        <textarea class="form-control" wire:model.blur="equipoForm.descripcion" placeholder="Ingrese una descripcion para el grupo" id="" rows="3"></textarea>
                    </div>       
                        @error('equipoForm.descripcion')
                            <label for="" class="text-danger">{{$message}}</label>
                        @enderror         
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
            document.addEventListener('create-equipo',event=>{
                alert('Equipo creado exitosamente! ');
            });
        </script>
    @endscript
</div>


