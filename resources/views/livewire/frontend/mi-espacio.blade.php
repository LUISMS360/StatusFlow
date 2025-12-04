<div class="container">    
    <h4>Mi Espacio</h4>
    <div class="row">
        <div class="col-sm-6">
            <form wire:submit="updateInfo">
                <div class="mb-3">
                    <label for="" class="form-label">Nombres</label>
                    <input
                        type="text"
                        class="form-control"
                        wire:model.blur="usuarioForm.name"
                        id=""
                        aria-describedby="helpId"
                        value="{{$usuario->name}}"
                    />
                </div>                
                <div class="mb-3">
                    <label for="" class="form-label">Email</label>
                    <input
                        type="email"
                        class="form-control"
                        wire:model.blur="usuarioForm.email"
                        id=""
                        aria-describedby="emailHelpId"
                        value="{{$usuario->email}}"
                    />
                </div>                             
                <div class="mb-3">
                    <label for="" class="form-label">New Password</label>
                    <input
                        type="password"
                        class="form-control"
                        wire:model.blur="usuarioForm.password"
                        id=""
                    />
                </div>           
                <div class="mb-3">
                    <label for="" class="form-label">Foto</label>
                    <input
                        type="file"
                        class="form-control"
                        wire:model.blur="usuarioForm.foto"
                        aria-describedby="fileHelpId"
                    />
                </div>                     
                <button
                    type="submit"
                    class="btn btn-primary"
                >
                    Actualizar
                </button>  
            </form>            
        </div>       
       <div class="col-12 col-sm-6 d-flex justify-content-center mt-5">
            <img src="{{ asset('storage/users/user.png') }}" 
                alt="Usuario" 
                class="img-fluid rounded-circle" 
                style="max-width: 280px; width: 100%; height: auto;">                                    
        </div>       
    </div>
     <div class="row">
        <div class="col-sm-10 d-flex justify-content-end py-5 ">
            <ul class="list-group list-group-numbered">
                <li class="list-group-item">Equipos Unidos:  </li>
                <li class="list-group-item">Tareas Pendientes: </li>
            </ul>
        </div>
    </div>
</div>
