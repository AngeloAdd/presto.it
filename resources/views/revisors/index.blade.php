<x-layout>
    <x-slot name="style">
        <style>
        hr{
            color: var(--sec-color);
        }

        .container {
            min-height: 100vh;
        }

        .btn-custom {
            background-color: var(--acc-color);
            color: white;
            position: relative;
            overflow: hidden;

        }

        .btn-custom span {
            color: white;
            position: relative;
        }

        .btn-custom::before {
            content: "";
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: var(--main-color);
            transform: translateX(-100%);
            transition: transform 0.4s;
        }

        .btn-custom:hover::before {
            transform: translateX(0)
        }

        

        </style>
    </x-slot>
    @if ($announcement)
        <div class="d-flex justify-content-center mt-5">
            <h3> Ci sono <span class="badge rounded-pill main-bg">{{\App\Models\Announcement::toBeRevised()}}</span> annunci da revisionare</h3>
        </div>
        <div class="container py-5 px-5 shadow mx-5 mb-5">
        <div class="row my-2 px-5">
            <div class="col-12 col-md-3">
                <h4>Titolo</h4>
            </div>
            <div class="col-12 col-md-9 main-text">
                <h3>{{$announcement->title}}</h3>
                <small class="sec-text">Creato il: {{$announcement->created_at->format('d/m/Y')}}</small>
            </div>
        </div>
        <hr>
        <div class="row my-2 px-5">
            <div class="col-12 col-md-3">
                <h4>Descrizione</h4>
            </div>
            <div class="col-12 col-md-9">
                <p>{{$announcement->body}}</p>
            </div>
        </div>
        <hr>
        <div class="row my-2 px-5">
            <div class="col-12 col-md-3">
                <h4>Prezzo</h4>
            </div>
            <div class="col-12 col-md-9">
                <h4 class="main-text">€ {{$announcement->price}}</h4>
            </div>
        </div>
        <hr>
        <div class="row my-2 px-5">
            <div class="col-12 col-md-3">
                <h4>Categoria</h4>
            </div>
            <div class="col-12 col-md-9 sec-text">
                <p>{{$announcement->category->name}}</p>
            </div>
        </div>
        <hr>
        <div class="row my-2 px-5">
            <div class="col-12 col-md-3">
                <h4>Immagini</h4>
            </div>
            <div class="col-12 col-md-9">
                @foreach ($announcement->announcementImages as $image)
                    <div class="row flex-row">
                        <div class="col-12 col-lg-4 my-3">
                            <img src="{{$image->getUrl(250,250)}}" alt="" srcset="">                    
                        </div>
                        <div class="col-12 col-lg-8 my-3">
                            <ul class="list-group list-group-flush">
                                <li class="d-flex justify-content-between align-items-start">
                                    <div class="ms-2 me-auto">
                                        <div class="fw-bold acc-text acc-text">Adult</div>
                                    </div>
                                    <p class="badge sec-bg rounded-pill">{{$image->adult}}</p>
                                </li>
                                <li class="d-flex justify-content-between align-items-start">
                                    <div class="ms-2 me-auto">
                                        <div class="fw-bold acc-text">Medical</div>

                                    </div>
                                    <p class="badge sec-bg rounded-pill">{{$image->medical}}</p>
                                </li>
                                <li class="d-flex justify-content-between align-items-start">
                                    <div class="ms-2 me-auto">
                                        <div class="fw-bold acc-text">Spoof</div>

                                    </div>
                                    <p class="badge sec-bg rounded-pill">{{$image->spoof}}</p>
                                </li>
                                <li class="d-flex justify-content-between align-items-start">
                                    <div class="ms-2 me-auto">
                                        <div class="fw-bold acc-text">Violence</div>

                                    </div>
                                    <p class="badge sec-bg rounded-pill">{{$image->violence}}</p>
                                </li>
                                <li class="d-flex justify-content-between align-items-start">
                                    <div class="ms-2 me-auto">
                                        <div class="fw-bold acc-text">Racy</div>
                                    </div>
                                    <p class="badge sec-bg rounded-pill">{{$image->racy}}</p>
                                </li>
                            </ul>
                            <section class="my-3">
                                <span class="main-text fw-bold">Labels:</span>
                                    @if ($image->labels)
                                    @foreach ($image->labels as $label)
                                        {{$label}},
                                    @endforeach
                                    @endif                                
                            </section>            
                        </div>
                    </div>
                    <hr>
                @endforeach    
            </div>
        </div>
        <div class="row pt-5">
            <div class="col-6 d-flex justify-content-end align-items-center">  
                <form action="{{route('revisor.reject', compact('announcement'))}}" method="POST">
                    @csrf
                    <button class="btn btn-custom fs-3" type="submit"><span>Cestino</span></button>
                </form>              
            </div>
            <div class="col-6 d-flex justify-content-start align-items-center">
            <form  action="{{route('revisor.accept', compact('announcement'))}}" method="POST">
                @csrf
                    <button class="btn btn-custom fs-3" type="submit"><span>Accetta</span></button>
            </form>
            </div>
        </div>
        </div>
        @else
        <div class="d-flex justify-content-center align-items-center my-4 ">            
            <h3>Nessun articolo da revisionare</h3>               
        </div>
        @endif
</x-layout>