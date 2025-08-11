        <div class="container">
            <h2 class="text-center">Tutti gli articoli...</h2>
        </div>
        <div class="container py-5">
            <div class="row g-3">
                @forelse ($articles as $article)
                <div class="col-md-4">
                    <div class="card position-relative">
                        <img src="{{ asset($article->image) }}" class="card-img-top" alt="{{ $article->title }}">
                        <div class="card-body">
                            <h5 class="card-title">{{$article->title}}</h5>
                            <p class="card-text text-truncate">{{$article->content}}</p>
                            <a href="{{ route('articles.show', $article) }}" class="btn btn-primary">Leggi di più</a>
                        </div>

                        @forelse ($article->categories as $category)
                            <span class="badge position-absolute top-0 end-0 m-2" style="{{ $category->color }}">{{ $category->name }}</span>
                        @empty
                        <span class="badge position-absolute top-0 end-0 m-2 bg-secondary text-white">Nessuna categoria selezionata</span>
                        @endforelse

                        <p class="position-absolute bottom-0 end-0 mb-3 me-3 text-muted">{{ $article->user->name }}</p>
                    </div>

                </div>
                @empty
                <p class="text-center">Al momento non ci sono articoli da mostrare</p>
                @endforelse
            </div>
        </div>