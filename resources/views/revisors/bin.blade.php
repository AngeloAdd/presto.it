<x-layout>
    <div class="container-fluid px-5 py-4">
        <div class="row">
        
            <div class="col-12 d-flex justify-content-center align-items-center">

                    <div class="container justify-content-center align-items-center">
                        <div class="row justify-content-center align-items-center">
                        @foreach ($announcements_rejected as $announcement)
                            @include('components._card')
                            <div class="col-12 mb-4 d-flex justify-content-center align-items-center">
                                <form action="{{route('revisor.undo', compact('announcement'))}}" method="POST">
                                    @csrf
                                    @method('PUT')
                                    <button class="btn main-bg text-white" type="submit">Annulla</button>
                                </form>
                            </div>
                        @endforeach

                    </div>
            
                </div>
            </div>
            
        </div>
    </div>
</x-layout>
