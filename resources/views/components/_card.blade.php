<div class="col-md-4 mb-4">
    <div class="card mb-3">
        <div class="row g-0">
            <div class="col-md-6">
                <img class="w-100 h-100" src="https://via.placeholder.com/150" alt="...">
            </div>
            <div class="col-md-6">
                <div class="card-body d-flex flex-column align-items-start justify-content-center">
                    <h5 class="card-title">{{$announcement->title}}</h5>
                    <p class="card-text"><small class="text-muted">Creato da: {{$announcement->user->name}}</small></p>
                    <p class="card-text">{{$announcement->body}}</p>
                    <p class="card-text"><small class="text-muted">Creato il: {{$announcement->created_at->format('d/m/Y')}}</small></p>
                    <small class="text-secondary">Prezzo {{$announcement->price}}</small>
                    <a href="{{route('announcements.show', ["category"=>$announcement->category])}}">{{$announcement->category->name}}</a>
                    <a href="#" class="btn btn-primary">Visualizza</a>
                </div>
            </div>
        </div>
    </div>
</div>
