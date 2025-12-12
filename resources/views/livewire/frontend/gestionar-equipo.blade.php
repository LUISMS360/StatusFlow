<div>
    <div class="card">
      <div class="card-body">
        <h5 class="card-title">{{$equipo->nombre}}</h5>
        <h6 class="card-subtitle mb-2 text-muted ">{{$equipo->descripcion}}</h6>
        <p class="card-text">{{$equipo->created_at}}</p>
        <p class="card-text">{{$equipo->updated_at}}</p>
        <p class="card-text">{{$equipo->user_id}}</p>
      </div>
    </div>
    {{-- BUSCADOR --}}    
    <div class="container-fluid mt-5 mb-5 bg-white p-5 rounded">
        <form>
            <div class="mb-3">
                <label for="" class="form-label lead">Buscar usuario</label>
                <input
                    type="text"
                    class="form-control"
                    wire:model.live="usuario"
                    id=""
                    aria-describedby="helpId"
                    placeholder="Busque por el nombre de  usuario"
                />
            </div>
            <div>
                <ul>
                    @foreach ($usuarios as $usuario)
                        <li>{{$usuario->name}} -  {{$usuario->email}} - <img src="{{ asset('storage/perfiles/'.$usuario->foto) }}"  alt="" style="height: 100px; max-width:100px;"> <button type="button" class="btn btn-success btn-sm" wire:click="agregarUsuario({{ $usuario->id }}, {{ $equipo->id }})">Agregar</button></li>
                    @endforeach
                </ul>
            </div>
        </form>
    </div>

    {{-- TABLA DE COMPAÑEROS --}}
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
                    <th scope="col">Email</th>
                    <th scope="col">Estado</th>                    
                    <th scope="col">Fecha Inicio</th>
                    <th scope="col">Accion</th>
                </tr>
            </thead>
            <tbody>
                @foreach($equipoUsers as $user)
                    <tr>
                        <td>{{$user->nombre}}</td>
                        <td>{{$user->email}}</td>
                        <td>{{$user->rol}}</td>
                        <td>{{$user->activo}}</td>                        
                        <td>{{$user->incorporacion}}</td>
                        <td>
                            <a href="{{ route('user.asignar.tarea', ['equipo'=>$equipo->id, 'usuario'=>$user->id]) }}" 
                        class="btn btn-warning btn-sm">
                        Gestionar
                        </a>
                        </td>                       
                        
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    @script
        <script>
            document.addEventListener('add-user',event=>{
                alert('Compañero agregado al grupo');
            });
        </script>
    @endscript
    @script
        <script>
            document.addEventListener('exists',event=>{
                alert('El Compañero ya pertenece al grupo');
            });
        </script>
    @endscript
</div>
