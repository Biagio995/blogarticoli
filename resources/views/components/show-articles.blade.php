    <div class="container">
        
        
        <h2 class="text-center">Dettaglio articolo {{ $article->title }}</h2>
    </div>
    
    <div class="container py-5">
        <div class="row">
            <div class="col-md-4">
                <img src="{{ $article->image }}" alt="{{ $article->title }}" class="img-fluid rounded-3">
            </div>
            <div class="col-md-8 d-flex flex-column justify-content-around gap-3">
                <h4>Autore: {{ $article->user->name }}</h4>
                @forelse ($article->categories as $category)
                <span class="row m-2" style="{{ $category->color }}">{{ $category->name }}</span>
                @empty
                <span class="row m-2 bg-secondary text-white">Nessuna categoria selezionata</span>
                @endforelse
                <p class="fs-4">{{ $article->content }}</p>
                <p>Data di pubblicazione: {{ $article->created_at->format('d/m/Y') }}</p>
            </div>
        </div>
    </div>
    
    <div class="row justify-content-center px-5">
        <a href="{{ route('articles.index') }}" class="btn btn-primary">Torna alla lista degli articoli</a>
    </div>