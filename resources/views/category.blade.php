<x-layout>
        <div class="container-fluid px-5">
            <div class="row">
            <div class="col-md-8 w-100 d-flex justify-content-center py-4">
                <h1>Questi sono i risultati per la categoria <span class="main-text">{{$category->name}}</span></h1>
            </div>
            @foreach ($announcements as $announcement)
                @include('components._card')
            @endforeach
            </div>
        </div>
    {{ $announcements->links() }}
</x-layout>
