<div>
    <div class="container rounded shadow">
        <label for="" class="lead">Tarea: </label> <strong class="">{{$tarea->nombre}}</strong> 
        <br>
        <label for="" class="lead">Descripcion: </label> <strong>{{$tarea->descripcion}}</strong>
        <br>
        <label for="" class="lead">Estada: </label> <strong>{{$tarea->activo}}</strong>
        <br>
        <label for="" class="lead">Fecha de creacion: </label> <strong>{{$tarea->created_at}}</strong>
        <br>
        <label for="" class="lead">Fecha de actualizacion: </label> <strong>{{$tarea->updated_at}}</strong>
        <br>
        <label for="" class="lead">Evidencia: </label> <strong>{{$tarea->evidencia}}</strong>
    </div>
</div>
