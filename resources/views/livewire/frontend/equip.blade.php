<div>    
    <div class="container mt-2 mb-5">
        <h4 class="mb-3">Equipos Creados</h4>
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
                                wire:navigate
                                href="{{route('gestionar.equipo',['equipo'=>$equipo->id])}}"
                                class="btn btn-primary btn-sm">Gestionar</button></a>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>        
    </div>
    <div class="container mt-5 mb-5">
        <h4 class="mb-4">
            Equipos a los que perteneces
        </h4>
        <div
            class="table-responsive"
        >
            <table
                class="table"
            >
                <thead>
                    <tr>
                        <th scope="col">Equipo</th>
                        <th scope="col">Estado</th>
                        <th scope="col">Incorporacion</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($equiposAdd as $equipo)
                        <tr>
                            <td>{{$equipo->equipo}}</td>
                            <td>{{$equipo->estado}}</td>
                            <td>{{$equipo->incorporacion}}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>        
    </div>
</div>
