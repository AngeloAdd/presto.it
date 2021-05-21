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

            .card-small-custom{
                font-size:1em;
            }

            .border-width-type{
                border-style: solid;
                border-width: 1px;
            }

            .border-color-custom {
                border-color: rgba(92, 92, 196, 0.2);
            }

            .font-color-custom {
                color: rgba(92, 92, 196, 0.5);
            }
            .font-trovaaffare{
                font-size: 2em;
            }

            .border-right-custom{
                border-right: 1px solid rgba(92, 92, 196, 0.2);
            }

            @media only screen and (max-width:425px)
            {
                .font-trovaaffare{
                font-size: 1.2rem;
               }
            }

            @media only screen and (max-width:992px){
                .border-right-custom{
                border-right: 0px solid rgba(92, 92, 196, 0.2);
                border-bottom: 1px solid rgba(92, 92, 196, 0.2);
            }
            }



        </style>
    </x-slot>
    
    <div class="container-fluid above-the-fold justify-content-center align-content-center">
        <div class="row mx-auto w-100 h-100 justify-content-center align-content-center">
            <div class="col-12 col-lg-8 d-flex justify-content-center">
                <h1 class="display-3 title-text presto-text text-center">
                    <span class="">{{__("ui.Benvenuti su")}}</span>
                    <span class="main-text">Presto</span>.it
                </h1>
            </div>
            <div class="col-12 d-flex justify-content-center">
               <div class="hr-custom main-bg">
               </div>
            </div>
            <div class="col-12 d-flex justify-content-center mb-3">
                <h2 class="text-white mt-2 font-trovaaffare fw-normal text-center">{{__("ui.Trova il tuo prossimo affare")}}</h2>
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

    <div class="py-5 px-4 mx-4">
        <div class="container-fluid justify-content-center align-items-center py-5 my-5">
            <div class="row justify-content-center align-items-center px-5 px-lg-0 py-0 py-lg-4 border-width-type border-color-custom">

                <div class="col-lg-3 d-flex justify-content-center align-items-center border-color-custom border-right-custom py-3 py-lg-2">
                    <div class="d-flex justify-content-center align-items-center">
                        <div class="ps-3">
                            <i class="bi bi-vector-pen display-5 display-lg-4 acc-text"></i>
                        </div>
                        <div class="d-flex justify-content-center align-items-start flex-column px-4">
                            <h4 class="fs-4 acc-text">Scrivi un Annuncio</h4>
                            <p class="m-0 font-color-custom card-small-custom">
                                Impieghi solo 30 secondi
                            </p>
                        </div>
                    </div>
                </div>
                
                <div class="col-lg-3 d-flex justify-content-center align-items-center border-right-custom py-3 py-lg-2">
                    <div class="d-flex justify-content-center align-items-center">
                        <div class="ps-3">
                            <i class="bi bi-chat-left-text display-5 display-lg-4 acc-text"></i>
                        </div>
                        <div class="d-flex justify-content-center align-items-start flex-column px-4">
                            <h4 class="fs-4 acc-text">Trova l'Annuncio</h4>
                            <p class="m-0 font-color-custom card-small-custom">
                                Ed entra subito in contatto
                            </p>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 d-flex justify-content-center align-items-center border-right-custom py-3 py-lg-2">
                    <div class="d-flex justify-content-center align-items-center">
                        <div class="ps-3">
                            <i class="bi bi-piggy-bank display-5 display-lg-4 acc-text"></i>
                        </div>
                        <div class="d-flex justify-content-center align-items-start flex-column px-4">
                            <h4 class="fs-4 acc-text">Mettiti in gioco</h4>
                            <p class="m-0 font-color-custom card-small-custom">
                                Lavora con noi
                            </p>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 d-flex justify-content-center align-items-center py-3 py-lg-2">
                    <div class="d-flex justify-content-center align-items-center">
                        <div class="ps-3">
                            <i class="bi bi-file-earmark-text display-5 display-lg-4 acc-text"></i>
                        </div>
                        <div class="d-flex justify-content-center align-items-start flex-column px-4">
                            <h4 class="fs-4 acc-text">Hai qualche dubbio?</h4>
                            <p class="m-0 font-color-custom card-small-custom">
                                Cerca nelle FAQ la risposta
                            </p>
                        </div>
                    </div>
                </div>      

            </div>
        </div>
    </div>

    
    

    <div class="d-flex my-5 py-5 px-5 mx-5 d-none">    
        <div class="col-12 col-md-3 px-3">
            <div class="card text-center acc-text">
                <div class="card-body">
                    <p>Annunci</p>
                    <i class="bi bi-megaphone fs-5"></i>
                </div>
            </div>
        </div>
        <div class="col-12 col-md-3 px-3">
            <div class="card border border-1 border-secondary text-center acc-text">
                <div class="card-body">
                    <p>Categorie</p>
                    <i class="bi bi-list-stars fs-5"></i>
                </div>
            </div>
        </div>
        <div class="col-12 col-md-3 px-3">
            <div class="card text-center acc-text">
                <div class="card-body">
                    <p>Utenti</p>
                    <i class="bi bi-person fs-5"></i>
                </div>
            </div>
        </div>
        <div class="col-12 col-md-3 px-3">
            <div class="card text-center acc-text">
                <div class="card-body">
                    <p>Recensioni</p>
                    <i class="bi bi-pencil-square fs-5"></i>
                </div>
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
    
</x-layout>