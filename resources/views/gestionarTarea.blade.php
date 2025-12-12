<x-layouts.app>
    <div>
        <div class="container mt-5">
            <div class="row">
                <div class="col-sm-4">
                    <form action="{{ route('gestionar.tarea') }}" method="POST" enctype="multipart/form-data">
                        @csrf
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

                        <input type="hidden" name="tarea" value="{{ $tarea->id }}">
                        <div class="mb-3">
                            <label class="form-label">Choose file</label>
                            <input type="file" id="evidencia" name="evidencia" class="form-control" />
                        </div>
                        @error('evidencia')
                            <div
                                class="alert alert-danger mt-2 mb2"
                                role="alert"
                            >
                                <strong>Error</strong> {{$message}}
                            </div>
                            
                        @enderror
                        <button type="submit" class="btn btn-primary mt-3">
                            Entregar
                        </button>                                                                      
                    </form>
                </div>
            </div>
        </div>
       @if (session('success'))
            <div class="alert alert-success mt-3 mb-3" role="alert">
                <strong>Exitoso:</strong> {{ session('success') }}
            </div>
        @endif
    </div>
</x-layouts.app>