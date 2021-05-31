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


            .grid-custom{
                display:grid;
                grid-template-columns: repeat(2, 1fr);
            }
            .subgrid{
                display:grid;
                grid-template-columns: 1fr;
                grid-template-rows: 60% 40%;
            }
            .subgrid-2{
                display:grid;
                grid-template-columns: 1fr;
                grid-template-rows: 45% 55%;
            }

            .grid-element{
                overflow: hidden;
            }

            .custom-swag{
                transition: 500ms ease-out;
                filter: grayscale(0.8) contrast(150%);
            }

            .custom-swag:hover{
                transform: scale(1.3);
                overflow: hidden;
                filter: grayscale(0.4) contrast(120%);
            }

            .annuncio-last{
                bottom: 0;
                color: var(--white-color);
                left: 0;
                font-size: 1em;
                z-index:99;
                font-weight: 900,
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

    <div class="pt-4 pb-2 px-4 mx-4">
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

    
@if(isset($lC[0]) || isset($lC[1]) || isset($lC[2]) || isset($lC[3]))
    <div class="container justify-content-center align-items-center pb-4">

        <div class="grid-custom justify-items-center align-content-center">
            <div class="subgrid">
                @if(!isset($lC[0]))
                @else
                    <div class="$lC[0] grid-element justify-content-center align-content-end m-2 position-relative grid-1 rounded-3">
                    <a href="{{route('last.announcement', ['cat'=>$lC[0]])}}" class=" btn main-bg position-absolute annuncio-last">L'ultimo annuncio in {{$lC[0]}}</a>
                    <img class="img-fluid w-100 h-100 custom-swag rounded-3" src="/img/mock/{{$lC[0]}}.jpg" alt="">
                    </div>
                @endif
                @if(!isset($lC[1]))
                @else
                    <div class="grid-element justify-content-center align-content-end m-2 position-relative rounded-3">
                    <a href="{{route('last.announcement', ['cat'=>$lC[1]])}}" class=" btn main-bg position-absolute annuncio-last">L'ultimo annuncio in {{$lC[1]}}</a>
                    <img class="img-fluid w-100 h-100 custom-swag rounded-3" src="/img/mock/{{$lC[1]}}.jpg" alt="">
                    </div>
                @endif
            </div>
            <div class="subgrid-2">
                @if(!isset($lC[2]))
                @else
                    <div class="grid-element justify-content-center align-content-start m-2 position-relative grid-2 rounded-3">
                    <a href="{{route('last.announcement', ['cat'=>$lC[2]])}}"  class=" btn main-bg position-absolute annuncio-last">L'ultimo annuncio in {{$lC[2]}}</a>
                    <img class="img-fluid w-100 h-100 custom-swag rounded-3" src="/img/mock/{{$lC[2]}}.jpg" alt="">
                    </div>
                @endif
                @if(!isset($lC[3]))
                @else
                    <div class="grid-element justify-content-center align-content-start m-2 position-relative rounded-3">
                    <a href="{{route('last.announcement', ['cat'=>$lC[3]])}}" class=" btn main-bg position-absolute annuncio-last">L'ultimo annuncio in {{$lC[3]}}</a>
                    <img class="img-fluid w-100 h-100 custom-swag rounded-3" src="/img/mock/{{$lC[3]}}.jpg" alt="">
                    </div>
                @endif
            </div>
        </div>
    </div>
@endif
    <div class="container-fluid px-5 mt-5 justify-content-center align-items-center">
        <div class="row justify-content-center align-items-center">
        <div class="col-12 d-flex justify-content-center align-items-center mb-5">
            <h2>Ultimi Annunci Pubblicati</h2>
        </div>
        </div>
        <div class="row w-100 justify-content-center align-items-center mx-0">
            @foreach ($announcements as $announcement)
                @include('components._card')
            @endforeach
        </div>
    </div>
    
    <div class="container justify-content-center align-items-center">
        <div class="row justify-content-center align-items-center">
            <div class="col-12 d-flex justify-content-center align-items-center">
                <h4>{{__('Continua a cercare tra gli annunci.')}}</h4>
            </div>
            <div class="col-12 d-flex justify-content-center align-items-center">
                <a href="{{route('announcements.index')}}" class="btn main-bg presto-text">Chi Cerca Trova</a>
            </div>
        </div>
    </div>

</x-layout>