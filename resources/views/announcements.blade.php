<x-layout>
    <div class="container-fluid px-5">
        <div class="row">
            @foreach ($announcements as $announcement)
            @include('components._card')
            @endforeach
        </div>
    </div>
    {{ $announcements->links() }}
</x-layout>
 