<x-layout>

    @if ($announcement)
    <div class="container-fluid px-5 py-5">
        <div class="row d-flex justify-content-center align-items-center">
            @include('components._card')
        </div>
        <div class="row">
            <div class="col-6 d-flex justify-content-center align-items-center">
                <form action="{{route('revisor.reject', compact('announcement'))}}" method="POST">
                    @csrf
                    <button class="btn btn-danger" type="submit">Cestino</button>
                </form>
            </div>
            <div class="col-6 d-flex justify-content-center align-items-center">
            <form  action="{{route('revisor.accept', compact('announcement'))}}" method="POST">
                @csrf
                    <button class="btn btn-success d-flex" type="submit">Accetta</button>
            </form>  
            </div>
        </div>
    </div>
    @else
        <h3>Nessun articolo da revisionare</h3>
    @endif
            
</x-layout>
