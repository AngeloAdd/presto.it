<div class="col-12 col-sm-6 col-xl-4 mb-4">
    <div class="card border border-light rounded mb-3 shadow rounded-1">
        <div class="row ps-lg-4">
            <div class="col-12 col-lg-6 d-flex flex-column justify-content-around align-items-center py-lg-4">
                <div id="carouselExampleControls{{$announcement->id}}" class="carousel slide w-100" data-bs-ride="carousel">
                    <div class="carousel-inner">
                        @foreach($announcement->announcementImages as $image) 
                            <div class="carousel-item @if($image===$announcement->announcementImages[0]) active @endif">
                            <img src="{{ $image->getUrl(250,250)}}" class="d-block w-100" alt="...">
                            </div>
                        @endforeach
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls{{$announcement->id}}" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls{{$announcement->id}}" data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>
            </div>
            <div class="col-12 col-lg-6 ps-lg-0">
                <div class="card-body d-flex flex-column align-items-start justify-content-between h-100">
                    <h3 class="card-title text-bold main-text mb-0">{{$announcement->title}}</h3>
                    <a class="text-decoration-none text-dark mt-2"> 
                        <small class="card-text sec-text mb-0 mt-3">Creato da: </small>
                        {{$announcement->user->name}}
                    </a> 
                    <a class="text-decoration-none main-text" href="{{route('announcements.show', ["category"=>$announcement->category])}}">
                        <small class="sec-text">Categoria: </small>
                        {{$announcement->category->name}}
                    </a>
                    <p class="card-text acc-text ">{{substr($announcement->body,0,10)}}</p>
                    <div class="d-flex justify-content-start align-item-center pb-2">

                        <p class="sec-text mb-0 d-flex align-items-center">Prezzo:</p>
                        <h4 class="main-text ms-2 mb-0 d-flex align-items-center">{{$announcement->price}}€ </h4>
                    </div>
                        <a href="{{route('announcement.show', compact('announcement'))}}" class="justify-self-end btn main-bg text-white">Visualizza</a>
                    <p class="card-text mt-2 w-100 d-flex justify-content-start"><small class="text-dark">Creato il: {{$announcement->created_at->format('d/m/Y')}}</small></p>
                </div>
            </div>
        </div>
    </div>
</div>
