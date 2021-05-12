<div class="col-md-4">
    <div class="card mb-3">
        <div class="row g-0">
            <div class="col-md-4">
                <img src="https://via.placeholder.com/150" alt="...">
            </div>
            <div class="col-md-8">
                <div class="card-body d-flex flex-column align-items-start justify-content-center">
                    <h5 class="card-title">{{$announcement->title}}</h5>
                    <p class="card-text"><small class="text-muted">Creato da: {{$announcement->user->name}}</small></p>
                    <p class="card-text">{{$announcement->body}}</p>
                    <p class="card-text"><small class="text-muted">Creato il: {{$announcement->created_at->format('d/m/Y')}}</small></p>
                    <a href="{{route('announcements.show', ["category"=>$announcement->category])}}" class="btn btn-link">{{$announcement->category->name}}</a>
                    <a href="#" class="btn btn-primary">Visualizza</a>
                </div>
            </div>
        </div>
    </div>
</div>
