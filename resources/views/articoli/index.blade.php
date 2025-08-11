<x-layout-component>
    <x-articles :articles="$articles" />

    {{ $articles->links() }}
</x-layout-component>