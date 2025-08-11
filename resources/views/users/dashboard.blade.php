<x-layout-component>

<div class="container py-5">
    <div class="row">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Image</th>
                    <th scope="col">Title</th>
                    <th scope="col">Action</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($articles as $article)
                <tr>
                    <th scope="row">{{ $article->id }}</th>
                    <td><img src="{{ asset($article->image) }}" style="width: 30px" alt="{{ $article->title }}"></td>
                    <td>{{ $article->title }}</td>
                    <td><a href="{{ route('articles.edit', $article) }}" class="btn btn-warning btn-sm">Modifica</a></td>
                    <td>
                        <form action="{{ route('articles.destroy', $article) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">Elimina</button>
                        </form>
                    </td>
                </tr>
                @empty

                @endforelse
            </tbody>
        </table>
    </div>
</div>
</x-layout-component>