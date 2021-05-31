<x-layout>
    <div class="container-fluid px-5">
        <div class="row">
            <div class="col-md-12 fs-5 d-flex justify-content-center align-items-center">
                Ecco i risultati della ricerca per <span class="main-text fs-4">{{$q}}</span>
            </div>
            <div class="col-md-12 d-flex justify-content-center align-items-center">
                <form method="GET" action="{{route('search')}}">
                    @csrf
                    <div class="input-group mb-3 d-flex justify-content-center align-items-center">
                        <input type="text" value="{{$q}}" name="q" class="form-control" placeholder="Ricerca" aria-label="Ricerca" aria-describedby="button-addon2" >
                        <button class="btn main-bg text-white" type="submit" id="button-addon2">Button</button>
                    </div>
                </form>
            </div>
        @foreach ($announcements as $announcement)
            @include('components._card')
        @endforeach
        </div>
    </div>
</x-layout>