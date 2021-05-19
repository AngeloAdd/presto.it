<div class="col-12 col-sm-6 col-xl-4 mb-4">
    <div class="card mb-3 shadow rounded-1">

        <div class="row ps-lg-4">
            <div class="col-12 col-lg-6 d-flex flex-column justify-content-around align-items-center py-lg-4">
                <!-- <img class="d-lg-flex w-100" src="https://picsum.photos/300" alt="..."> -->

                <div id="carouselExampleControls" class="carousel slide w-100" data-bs-ride="carousel">
                    <div class="carousel-inner">
                    @foreach($announcement->announcementImages as $image) 
                        <div class="carousel-item @if($image===$announcement->announcementImages[0]) active @endif">
                        <img src="{{ $image->getUrl(250,250)}}" class="d-block w-100" alt="...">
                        </div>
                    @endforeach
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>
            </div>
            <div class="col-12 col-lg-6 ps-lg-0">
                <div class="card-body d-flex flex-column align-items-start justify-content-between h-100">
                    <h3 class="card-title text-bold main-text mb-0">{{$announcement->title}}</h3>
                    <small class="card-text sec-text mb-0">
                        Creato da: {{$announcement->user->name}}
                    </small>
                    <a class="text-decoration-none acc-text" href="{{route('announcements.show', ["category"=>$announcement->category])}}">
                        <small class="sec-text">Categoria: </small>
                        {{$announcement->category->name}}
                    </a>
                    <p class="card-text acc-text">{{substr($announcement->body,0,10)}}</p>
                    <div class="d-flex justify-content-start align-item-center pb-2">

                        <p class="sec-text mb-0 d-flex align-items-center">Prezzo:</p>
                        <h3 class="main-text ms-2 mb-0 d-flex align-items-center">{{$announcement->price}}€ </h3>
                    </div>
                        <a href="{{route('announcement.show', compact('announcement'))}}" class="justify-self-end btn main-bg text-white">Visualizza</a>
                    <p class="card-text mb-0 mt-2 w-100 d-flex justify-content-end"><small class="sec-text">Creato il: {{$announcement->created_at->format('d/m/Y')}}</small></p>
                </div>
            </div>
        </div>
    </div>
</div>
