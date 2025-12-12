<x-layouts.app>
    <div class="container mt-5">
        @if (session('success'))
            <div class="alert alert-success">
                <strong>Exitoso:</strong> {{ session('success') }}
            </div>
        @endif
         
        <div class="row">
            <div class="col-sm-6">
               <form action="{{ route('mi.espacio.update') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label for="" class="form-label">Name</label>
                        <input
                            type="text"
                            class="form-control"
                            name="name"
                            value="{{ $usuario->name }}"
                            id=""
                            aria-describedby="helpId"
                        />
                        <small id="helpId" class="form-text text-muted">Puede cambiar su nombre de usuario</small>
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Email</label>
                        <input
                            type="email"
                            class="form-control"
                            name="email"
                            value="{{ $usuario->email }}"
                            id=""
                            aria-describedby="emailHelpId"
                            placeholder="abc@mail.com"
                        />
                        <small id="emailHelpId" class="form-text text-muted"
                            >Puede cambiar su email</small
                        >
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Foto de perfil</label>
                        <input
                            type="file"
                            class="form-control"
                            name="foto"
                            id=""
                            placeholder=""
                            aria-describedby="fileHelpId"
                        />
                        <div id="fileHelpId" class="form-text">Actualice su foto de perfil</div>
                    </div>
                    <button
                        type="submit"
                        class="btn btn-primary"
                    >
                        Actualizar
                    </button>                                 
                </form>
            </div>
            <div class="col-sm-6">
                <img src="{{ asset('storage/perfiles/'.$usuario->foto) }}" alt="" class="rounded" style="height: auto; max-width:280px;">
            </div>
        </div>        
    </div>    
     
</x-layouts.app>
