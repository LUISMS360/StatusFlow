<div>
    <div class="card" style="">
      <div class="card-body">
        <h5 class="card-title">{{$equipo->nombre}}</h5>
        <h6 class="card-subtitle mb-2 text-muted ">{{$equipo->descripcion}}</h6>
        <p class="card-text">{{$equipo->descripcion}}</p>
        <p class="card-text">{{$equipo->created_at}}</p>
        <p class="card-text">{{$equipo->updated_at}}</p>
        <p class="card-text">{{$equipo->user_id}}</p>
      </div>
    </div>
    {{-- BUSCADOR --}}
    <div class="container mt-5 mb-5">
        <form>
            <div class="mb-3">
                <label for="" class="form-label">Buscar usuario</label>
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
                        <li>{{$usuario->name}} -  {{$usuario->email}} - <button class="btn btn-success btn-sm" wire:click="agregarUsuario($usuario->id,$equipo->id)">Agregar</button></li>
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
                </tr>
            </thead>
            <tbody>
            </tbody>
        </table>
    </div>
    
</div>
