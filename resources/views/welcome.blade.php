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
        <div class="row w-100 h-100 justify-content-center align-content-center">
            <div class="col-8 d-flex justify-content-center">
                <h1 class="display-3 title-text text-white">Benvenuti in <span class="main-text">Presto</span>.it</h1>
            </div>
            <div class="col-8 d-flex justify-content-center">
               <div class="hr-custom main-bg">
               </div>
            </div>
            <div class="col-8 d-flex justify-content-center mb-3">
                <h2 class="text-white mt-2">Trova il tuo prossimo affare</h2>
            </div>
            <div class="col-8 d-flex justify-content-center">
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
</x-layout>
