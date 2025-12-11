<div>
    <div class="container mt-5">
        <div class="row">
            <div class="col-sm-4">
                <form wire:submit.prevent="updateTarea" enctype="multipart/form-data">
                    <h4>Tarea: {{$tarea->nombre}} </h4>
                    <label for="">Descripcion: {{$tarea->descripcion}} </label>
                    <br>
                    <label for="">Estado: {{$tarea->estado}} </label>
                    <br>
                    <label for="">Creacion: {{$tarea->created_at}}</label>
                    <br>
                    <label for="">Equipo: {{$tarea->equipo_id}} </label>
                    <br>
                    @if($tarea->evidencia)
                        <a href="{{asset('storage/tareas/'.$tarea->evidencia)}}">{{$tarea->evidencia}}</a>
                    @endif

                    <div class="mb-3">
                        <label class="form-label">Choose file</label>
                        <input type="file" id="evidencia" wire:model="evidencia" class="form-control" />
                    </div>

                    <button type="submit" class="btn btn-primary mt-3">
                        Entregar
                    </button>                                                                      
                </form>
            </div>
        </div>
    </div>
    @script
        <script>
            document.addEventListener('evidencia-subida',event=>{
                alert('se ha subido la evidencia correctamente!');
            });
        </script>
    @endscript
</div>
