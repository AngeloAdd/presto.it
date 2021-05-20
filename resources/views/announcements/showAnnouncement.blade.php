<x-layout>
    <div class="vh-100 w-100">

        {{-- BARRA DI RICERCA --}}
        <div class="container-fluid mt-2">
            <div class="row">
                <div class="col-12 col-md-6">
                    <h3>Cerca fra i nostri annunci</h3>
                </div>
                <div class="col-12 col-md-6">
                    <form method="GET" action="{{route('search')}}">
                        @csrf
                        <div class="d-flex justify-content-center align-items-center w-100">
                            <input type="text" name="q" class="form-control sec-text input-search-custom w-100" placeholder="Ricerca Annuncio" aria-label="Ricerca" aria-describedby="button-addon2" >
                            <button class="btn main-bg text-white btn-search-custom" type="submit" id="button-addon2">Cerca</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        {{-- TITOLO ANNUNCIO --}}
        <div class="container-fluid d-flex justify-content-center mt-3">
            <div class="row">
                <h1 class="display-4 main-text">{{$announcement->title}}</h1>
            </div>
        </div>
        {{-- ANNUNCIO --}}
        <div class="container-fluid">
            <div class="row col-8">
                <div class="col-12 col-md-6">
                    <div class="d-flex justify-content-end">
                        <div id="announcementCarousel" class="carousel slide" data-bs-ride="carousel">
                            <div class="carousel-inner">
                                @foreach ($announcement->announcementImages as $image)
                                <div class="carousel-item @if($image===$announcement->announcementImages[0]) active @endif">
                                    <img src="{{$image->getUrl(250,250)}}" alt="">
                                </div>
                                @endforeach
                            </div>
                            <button class="carousel-control-prev" type="button" data-bs-target="#announcementCarousel" data-bs-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                              <span class="visually-hidden">Previous</span>
                            </button>
                            <button class="carousel-control-next" type="button" data-bs-target="#announcementCarousel" data-bs-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Next</span>
                            </button>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-6">
                    <p class="acc-text display-5">{{$announcement->body}}.</p>
                    <div class="row">   <hr>    </div>
                    <p class="lead main-text display-6"><small class="sec-text display-6">Prezzo: </small> €{{$announcement->price}}</p>
                    <button class="btn sec-bg text-white mb-2">Aggiungi ai preferiti</button>
                    <p>Contatta il venditore:<button type="button" class="btn" data-bs-toggle="modal" data-bs-target="#exampleModal">
                        qui
                      </button></p>
                </div>
                <div class="col-12">
                    <p>Tags:</p>
                <ul class="d-flex flex-wrap list-unstyled">
                @foreach ($announcement->announcementImages as $image)
                @foreach ($image->labels as $label)
                  <li class="unstyled-list border rounded-pill ms-3"> {{$label}} </li>
                @endforeach
                @endforeach
                </ul>
                </div>
            </div>
        </div>

        {{-- POPUP --}}

        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Contatta il venditore</h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="card shadow">
                        <div class="card-header title-text">Messaggio:</div>
                                <div class="row mb-3 mt-3 ms-2">
                                    <label for="body" class="col-md-4 form-label text-md-right">scrivi qui il tuo messaggio </label>

                                    <div class="col-md-6">
                                        <textarea rows="6" id="body" class="form-control" name="body" required autocomplete="Articolo">{{ old('body') }}</textarea>
                                    </div>
                                </div>
                                <div class="mb-3 row mb-0">
                                    <span>Messaggi preimpostati:</span>
                                    <div class="col-md-6 offset-md-4">
                                        <button type="button" class="btn sec-bg text-white mb-1">Il prezzo è trattabile?</button>
                                        <button type="button" class="btn sec-bg text-white mb-1">Quanti pezzi sono disponibili?</button>
                                    </div>
                                </div>
                                <div class="mb-3 row mb-0">
                                    <div class="col-md-6 offset-md-4">
                                        <button type="button" class="btn main-bg text-white">Invia</button>
                                        <button type="button" class="btn main-bg text-white" data-bs-dismiss="modal">Chiudi</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
              </div>
            </div>
          </div>

</x-layout>
