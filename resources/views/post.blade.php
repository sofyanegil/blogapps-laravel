<x-layout>
    <x-slot:title>{{ $title }}</x-slot:title>

    <article class="py-8 max-w-screen-md border-gray-300">
        <h2 class="mb-1 text-3xl tracking-tight font-bold text-gray-900">{{ $post->title }}</h2>
        <div class="text-base text-gray-500">
            <a href="/authors/{{ $post->user->username }}" class="hover:underline">{{ $post->user->name }}</a> |
            {{ $post->created_at->diffForHumans() }}
        </div>
        <p class="mt-4 text-lg text-gray-600">{{ $post->body }}</p>
        <a href="/posts/" class="font-medium text-blue-500 hover:underline"> &laquo; Back to posts</a>
    </article>
</x-layout>
