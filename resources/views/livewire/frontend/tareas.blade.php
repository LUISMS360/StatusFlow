<div>
    TAREAS
   <div
    class="table-responsive mt-4"
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
                <th scope="col">Equipo</th>
                <th scope="col">Accion</th>
            </tr>
        </thead>
        <tbody>
            @foreach ( $tareas as $tarea )
                <tr>
                    <td>{{$tarea->id}}</td>
                    <td>{{$tarea->nombre}}</td>
                    <td>{{$tarea->descripcion}}</td>
                    <td>{{$tarea->estado}}</td>
                    <td>{{$tarea->created_at}}</td>
                    <td>{{$tarea->equipo_id}}</td>
                    <td><a href="{{ route('gestionar.tarea.view',['tarea'=>$tarea->id]) }}" class="btn btn-success btn-sm">Gestionar</a></td>
                </tr>
            @endforeach
        </tbody>
    </table>
   </div>
   

    {{ $tareas->links() }}

</div>
