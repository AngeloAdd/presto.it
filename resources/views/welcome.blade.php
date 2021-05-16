<x-layout>

    <div class="container-fluid above-the-fold">
        <div class="row w-100 justify-content-center align-items-center my-auto">
            <div class="col-8 justify-content-center align-items-center">
            <h1 class="display-3 title-text text-white">Benvenuti in Presto.it</h1>
            </div>
            <div class="col-8">
            <h2 class="display-5 title-text acc-text">Trova il tuo prossimo affare</h2>
            </div>
            <div class="col-8">
            <form method="GET" action="{{route('search')}}">
                @csrf
                <input type="text" name="q" class="form-control w-100" placeholder="Ricerca" aria-label="Ricerca" aria-describedby="button-addon2" >
                <button class="btn main-bg text-white" type="submit" id="button-addon2">Button</button>
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
