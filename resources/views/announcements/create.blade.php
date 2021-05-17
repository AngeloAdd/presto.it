<x-layout>
    <div class="container pt-4 mt-2">
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
            <div class="col-md-8">
                <div class="card shadow">
                    <div class="card-header title-text">Crea Annuncio</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('announcement.store') }}">
                            @csrf
                            <div class="mb-3 row">
                                <label for="password-confirm" class="col-md-4 form-label text-md-right">Scegli Categoria:</label>

                                <div class="col-md-6">
                                    <select name="category_id" id="category">
                                        @foreach ($categories as $category)
                                            <option value="{{$category->id}}" {{old('category') === $category->id ? 'selected' : ''}}>
                                                {{$category->name}}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="title" class="col-md-4 form-label text-md-right">Articolo:</label>

                                <div class="col-md-6">
                                    <input id="title" type="text" class="form-control @error('title') is-invalid @enderror" name="title" value="{{ old('title') }}" required autocomplete="Titolo" autofocus>

                                    @error('title')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="price" class="col-md-4 form-label text-md-right">Prezzo:</label>

                                <div class="col-md-6">
                                    <input id="price" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" type="text" class="form-control @error('price') is-invalid @enderror" name="price" value="{{ old('title') }}" required autocomplete="Titolo" autofocus>

                                    @error('price')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="mb-3 row">
                                <label for="body" class="col-md-4 form-label text-md-right">Descrizione: </label>

                                <div class="col-md-6">
                                    <textarea id="body" type="text" class="form-control @error('body') is-invalid @enderror" name="body" required autocomplete="Articolo">{{ old('body') }}</textarea>

                                    @error('body')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="mb-3 row mb-0">
                                <div class="col-md-6 offset-md-4">
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
</x-layout>
