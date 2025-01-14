<x-layout>
    <x-slot:title>{{ $title }}</x-slot:title>

    @foreach ($posts as $post)
        <article class="py-8 max-w-screen-md border-b border-gray-300">
            <a href="/posts/{{ $post->slug }}">
                <h2 class="mb-1 text-3xl tracking-tight font-bold text-gray-900">{{ $post->title }}</h2>
            </a>
            <div class="text-base text-gray-500">
                <a class="hover:underline" href="/authors/{{ $post->user->username }}">{{ $post->user->name }}</a> |
                {{ $post->created_at->format('F j, Y') }}
                <span>
                    <a href="/categories/{{ $post->category->slug }}"
                        class="px-3 py-1 bg-blue-200 text-blue-800 rounded-full hover:bg-blue-400">{{ $post->category->name }}</a>
                </span>
            </div>
            <p class="mt-4 text-lg text-gray-600">{{ Str::limit($post->body, 100, '...') }}</p>
            <a href="/posts/{{ $post->slug }}" class="font-medium text-blue-500 hover:underline">Read more &raquo;</a>
        </article>
    @endforeach
</x-layout>
