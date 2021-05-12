<x-layout>
    <div class="container">
        <div class="row">
        @foreach ($announcements as $announcement)
            <div class="col-md-4">
                <div class="card">
                    <img src="https://via.placeholder.com/150" class="card-img-top float-left" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">{{$announcement->title}}</h5>
                        <p class="card-text">{{$announcement->body}}</p>
                        <a href="#" class="btn btn-primary">Go somewhere</a>
                    </div>
                </div>   
            </div>
        @endforeach  
        </div>
    </div>
</x-layout>