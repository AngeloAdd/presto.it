<x-layout>
    <div class="container-fluid px-5">
        <div class="row">
            @foreach ($announcements as $announcement)
            @include('components._card')
            @endforeach
        {{ $announcements->links() }}
        </div>
    </div>
</x-layout>
