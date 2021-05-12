<x-layout>
    <div class="container">
        <div class="row">
        @foreach ($announcements as $announcement)
            @include('components._card')
        @endforeach
        </div>
    </div>
</x-layout>
