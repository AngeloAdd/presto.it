<x-layout>
    <div class="container-fluid px-5">
        <div class="row">
            <div class="col-md-12">
                <div class="input-group mb-3">
                    <form method="GET" action="{{route('search')}}">
                        @csrf
                    <input type="text" name="q" class="form-control" placeholder="Ricerca" aria-label="Ricerca" aria-describedby="button-addon2" >
                    <button class="btn main-bg text-white" type="submit" id="button-addon2">Button</button>
                    </form>
                </div>
            </div>
        @foreach ($announcements as $announcement)
            @include('components._card')
        @endforeach
        </div>
    </div>
</x-layout>
