<x-layout>

    <div class="vh-100 w-100 d-flex justify-content-center align-items-center above-the-fold">

        <div class="mb-3">
            <form method="GET" action="{{route('search')}}">
                @csrf
                <input type="text" name="q" class="form-control w-100" placeholder="Ricerca" aria-label="Ricerca" aria-describedby="button-addon2" >
                <button class="btn main-bg text-white" type="submit" id="button-addon2">Button</button>
            </form>
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
