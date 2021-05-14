<x-layout>
    <div class="container-fluid px-5">
        <div class="row">
            @foreach ($announcements_rejected as $announcement)
            @include('components._card')
            @endforeach
        </div>
    </div>
</x-layout>
