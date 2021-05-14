<x-layout>
    <div class="container-fluid px-5">
        <div class="row">
            @foreach ($announcements_rejected as $announcement)
                @include('components._card')
            <form action="{{route('revisor.undo', compact('announcement'))}}" method="POST">
                @csrf
                @method('PUT')
                <button class="btn main-bg text-white" type="submit">Annulla</button>
            </form>
            @endforeach
        </div>
    </div>
</x-layout>
