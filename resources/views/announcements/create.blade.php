<x-layout>
    <div class="altezza">
        <div class="container pt-4 mt-2 my-5">
                <div class="row justify-content-center">
                    <div class="col-md-8">
                        @if (session('message'))
                            <div class="alert alert-success mb-2">
                                {{session('message')}}
                            </div>
                        @endif
                    </div>
                </div>
                <div class="row justify-content-center">
                    <div class="col-12 col-md-8">
                        <div class="card shadow">
                            <div class="card-header title-text acc-bg text-white">Crea Annuncio</div>
                            <div class="card-body px-5 mx-5">
                                <form method="POST" action="{{ route('announcement.store') }}">
                                    @csrf
                                    <input type="hidden" value="{{$uniqueSecret}}" name="uniqueSecret">
                                    <div class="mb-3 row">

                                        <div class="col-md-12">
                                        <label for=""></label>
                                            <select name="category_id" style="border-color: #ced4da;" class="border-1 rounded-3" id="category">
                                                @foreach ($categories as $category)
                                                    <option value="{{$category->id}}" {{old('category') === $category->id ? 'selected' : ''}}>
                                                        {{$category->name}}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="mb-3 row">

                                        <div class="col-md-12">
                                            <input id="title"  placeholder="Articoli:" type="text" class=" form-control @error('title') is-invalid @enderror" name="title" value="{{ old('title') }}" required autocomplete="Titolo" autofocus>

                                            @error('title')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="mb-3 row">
                                        
                                        <div class="col-md-12">
                                            <input id="price" placeholder="Prezzo:" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" type="text" class="form-control @error('price') is-invalid @enderror" name="price" value="{{ old('title') }}" required autocomplete="Titolo" autofocus>

                                            @error('price')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="mb-3 row">

                                        <div class="col-md-12">
                                            <textarea rows="6" id="body" placeholder="Descrizione, Max-500 Lettere" class="form-control @error('body') is-invalid @enderror" name="body" required autocomplete="Articolo">{{ old('body') }}</textarea>

                                            @error('body')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="mb-3 row ">
                                        <div class="col-md-12">
                                        <div class="dropzone " id="drophere"></div>
                                        </div>
                                    </div>
                                    <div class="mb-3 row mb-0">
                                        <div class="col-md-12 d-flex justify-content-center align-item-center">
                                            <button type="submit" class="btn main-bg text-white">
                                                Pubblica Annuncio
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>   
    
</x-layout>
