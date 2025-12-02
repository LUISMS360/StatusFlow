<div>
    <ul>
        <li>{{$equipo->nombre}}</li>
        <li>{{$equipo->descripcion}}</li>
        <li>{{$equipo->created_at}}</li>
        <li>{{$equipo->updated_at}}</li>
        <li>{{$equipo->user_id}}</li>
    </ul>
    <div class="container mt-5">
        <form>
            <div class="mb-3">
                <label for="" class="form-label">Name</label>
                <input
                    type="text"
                    class="form-control"
                    wire:model.live="usuario"
                    id=""
                    aria-describedby="helpId"
                    placeholder="Busque por el nombre de  usuario"
                />
                <small id="helpId" class="form-text text-muted">Help text</small>
            </div>
            <div>
                <ul>
                    @foreach ($usuarios as $usuario)
                        <li>{{$usuario->name}} -  {{$usuario->email}} - <button class="btn btn-success btn-sm">Agregar</button></li>
                    @endforeach
                </ul>
            </div>
        </form>
    </div>
</div>
