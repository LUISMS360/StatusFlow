<div>
    <h4>Tus equipos</h4>
    <div class="container mt-5">
        <div
            class="table-responsive"
        >
            <table
                class="table"
            >
                <thead>
                    <tr>
                        <th scope="col">Nombre</th>
                        <th scope="col">Descripcion</th>                        
                        <th scope="col">Creador</th>                        
                        <th scope="col">Creacion</th>
                        <th scope="col">Actualizacion</th>
                        <th scope="col">Accion</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($equipos as $equipo )
                        <tr>
                            <td>{{$equipo->nombre}}</td>
                            <td>{{$equipo->descripcion}}</td>
                            <td>{{$equipo->user->email}}</td>
                            <td>{{$equipo->created_at}}</td>
                            <td>{{$equipo->updated_at}}</td>
                            <td><a 
                                href="{{route('gestionar.equipo',['equipo'=>$equipo->id])}}"
                                class="btn btn-primary btn-sm">Gestionar</button></a>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        
    </div>
</div>
