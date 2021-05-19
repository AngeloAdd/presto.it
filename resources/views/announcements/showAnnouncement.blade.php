<x-layout>
  <div class="d-flex w-100 justify-content-center flex-column align-items-center">
      <h1 class="display-4 main-text">{{$announcement->title}}</h1>
      <p class="lead main-text"><small class="sec-text">Prezzo: </small> €{{$announcement->price}}</p>
      <hr class="my-4">
      <p class="acc-text">{{$announcement->body}}.</p>
      <a href="{{route('announcements.show', ["category"=>$announcement->category])}}" class="text-decoration-none" role="button"> <small class="sec-text">Categoria: </small>
        {{$announcement->category->name}}</a>
      <small class="card-text sec-text mb-0">
          Creato da: {{$announcement->user->name}}
      </small>
    </div>
</x-layout>