<x-layout-component>
    <div class="container">
        <div class="row justify-content-center py-5">
            <form class="col-md-6" method="POST" action="{{ route('articles.store') }}" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Titolo dell'articolo</label>
                    <input value="{{ old('title') }}" type="text" class="form-control" name="title" aria-describedby="emailHelp">
                    @error('title')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Contenuto dell'articolo</label>
                    <textarea class="form-control" name="content" rows="5">{{ old('content') }}</textarea>
                    @error('content')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Carica qui l'immagine</label>
                    <input type="file" class="form-control" name="image" aria-describedby="emailHelp">
                    @error('image')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="categories" class="form-label">Seleziona le categorie</label>
                    <select name="categories[]" class="form-select" multiple>
                        <option value="">Seleziona una categoria</option>
                        @foreach ($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endforeach
                    </select>
                </div>
                <button type="submit" class="btn btn-primary">Pubblica ora</button>
            </form>
        </div>
    </div>
</x-layout-component>