<x-layout>
    <div class="container">
        <div class="row">
            @foreach ($announcements as $announcement)
            @include('components._card')
            @endforeach
        {{ $announcements->links() }}
        </div>
    </div>
</x-layout>
