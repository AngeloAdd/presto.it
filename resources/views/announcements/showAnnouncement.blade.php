<x-layout>
    <div class="d-flex w-100 justify-content-center flex-column align-items-center">
        <h1 class="display-4 main-text">{{$announcement->title}}</h1>
        <p class="lead main-text">€{{$announcement->price}}</p>
        <hr class="my-4">
        <p class="acc-text">{{$announcement->body}}.</p>
        <a href="#" role="button">{{$announcement->category->name}}</a>
      </div>
</x-layout>
