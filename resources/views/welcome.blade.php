<x-layout>
    <x-slot name="style">
        <style>
            .hr-custom {
                width: 4em;
                height: 3px;
                border-radius: 20%;
            }
            .input-search-custom {
                border-bottom-right-radius: 0%;
                border-top-right-radius: 0%;

            }
            .btn-search-custom {
                border-bottom-left-radius: 0%;
                border-top-left-radius: 0%;
            }

        </style>
    </x-slot>
    <div class="container-fluid above-the-fold justify-content-center align-content-center">
        <div class="row mx-auto w-100 h-100 justify-content-center align-content-center">
            <div class="col-12 col-md-8 d-flex justify-content-center">
                <h1 class="display-3 title-text text-white">
                    <span class="d-none d-md-inline">{{__("ui.Benvenuti su")}}</span>
                    <span class="main-text">Presto</span>.it
                </h1>
            </div>
            <div class="col-12 d-flex justify-content-center">
               <div class="hr-custom main-bg">
               </div>
            </div>
            <div class="col-12 d-flex justify-content-center mb-3">
                <h2 class="text-white mt-2 fs-2 fw-normal">{{__("ui.Trova il tuo prossimo affare")}}</h2>
            </div>
            <div class="col-12 d-flex justify-content-center">
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

    <div class="container-fluid px-5 mt-5">
        <div class="row w-100">
            @foreach ($announcements as $announcement)
                @include('components._card')
            @endforeach
        </div>
    </div>
    <div class="d-flex my-5">    
        <div class="col-12 col-md-3">
            <div class="card text-center main-text">
                <div class="card-body">
                    <p>Annunci</p>
                    <i class="bi bi-megaphone fs-5"></i>
                </div>
            </div>
        </div>
        <div class="col-12 col-md-3">
            <div class="card text-center main-text">
                <div class="card-body">
                    <p>Categorie</p>
                    <i class="bi bi-list-stars fs-5"></i>
                </div>
            </div>
        </div>
        <div class="col-12 col-md-3">
            <div class="card text-center main-text">
                <div class="card-body">
                    <p>Utenti</p>
                    <i class="bi bi-person fs-5"></i>
                </div>
            </div>
        </div>
        <div class="col-12 col-md-3">
            <div class="card text-center main-text">
                <div class="card-body">
                    <p>Recensioni</p>
                    <i class="bi bi-pencil-square fs-5"></i>
                </div>
            </div>
        </div>
    </div>
</x-layout>