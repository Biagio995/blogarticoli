<x-layout-component>
    <div class="container">
        <div class="row justify-content-center py-5">
            <form class="col-md-6" method="POST" action="{{ route('articles.update', $article) }}" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div>
                    <img src="{{ $article->image }}" alt="" class="img-fluid">
                </div>
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Titolo dell'articolo</label>
                    <input value="{{ $article->title }}" type="text" class="form-control" name="title" aria-describedby="emailHelp">
                    @error('title')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Contenuto dell'articolo</label>
                    <textarea class="form-control" name="content" rows="5">{{ $article->content }}</textarea>
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
                    <label for="categories" class="form-label"></label>
                    <select name="categories[]" class="form-select" multiple>
                        @foreach ($categories as $category)
                        <option @if($article->categories->contains($category->id)) selected @endif value="{{ $category->id }}">{{ $category->name }}</option>
                        @endforeach
                    </select>
                </div>
                <button type="submit" class="btn btn-primary">Salva le modifiche</button>
            </form>
        </div>
    </div>
</x-layout-component>