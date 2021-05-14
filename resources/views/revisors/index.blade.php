<x-layout>
    @if ($announcement)
        <div class="container-fluid">
             <div class="row">
                <div class="col-md-4 mb-4">
                <div class="card mb-3">
                    <div class="row g-0">
                        <div class="col-md-6">
                            <img class="w-100 h-100" src="https://via.placeholder.com/150" alt="...">
                        </div>
                        <div class="col-md-6">
                            <div class="card-body d-flex flex-column align-items-start justify-content-center">
                                <h3 class="card-title text-bold main-text mb-0">{{$announcement->title}}</h3>
                                <p class="card-text"><small class="text-muted">Creato da: {{$announcement->user->name}}</small></p>
                                <p class="card-text">{{$announcement->body}}</p>
                                <p class="my-1 ml-5 text-secondary">Prezzo: <span class="fs-5 main-text">{{$announcement->price}}€ </span></p>
                                <a class="text-decoration-none text-secondary my-2" href="{{route('announcements.show', ["category"=>$announcement->category])}}">Categoria: <span class="fs-5 sec-text">{{$announcement->category->name}}</span></a>
                            
                                <a href="#" class="btn sec-bg text-white">Visualizza</a>
                                <p class="card-text mb-0 w-100 d-flex justify-content-end"><small class="text-muted">Creato il: {{$announcement->created_at->format('d/m/Y')}}</small></p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card mb-3">
                    <div class="row g-0">
                        <div class="col-md-6">
                            <img class="w-100 h-100" src="https://via.placeholder.com/150" alt="...">
                        </div>
                        <div class="col-md-6">
                            <div class="card-body d-flex flex-column align-items-start justify-content-center">
                                ... ... ...
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card mb-3">
                    <div class="row g-0">
                        <div class="col-md-6">
                            <img class="w-100 h-100" src="https://via.placeholder.com/150" alt="...">
                        </div>
                        <div class="col-md-6">
                            <div class="card-body d-flex flex-column align-items-start justify-content-center">
                                ... ... ...
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card mb-3">
                    <div class="row g-0">
                        <div class="col-md-6">
                            <img class="w-100 h-100" src="https://via.placeholder.com/150" alt="...">
                        </div>
                        <div class="col-md-6">
                            <div class="card-body d-flex flex-column align-items-start justify-content-center">
                                ... ... ...
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div> 
        <a href="" action method="POST">
        @csrf
        <button class="btn btn-danger" type="submit">Cestino</button>
    </a>
    <a href="" action method="POST">
         @csrf
        <button class="btn btn-success d-flex" type="submit">Accetta</button>
    </a>   

    @else
        <h3>Nessun articolo da revisionare</h3>
    @endif
 
</x-layout>
