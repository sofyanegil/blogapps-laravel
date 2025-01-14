<x-layout>
    <x-slot:title>{{ $title }}</x-slot:title>

    <div class="flex justify-between px-4 mx-auto max-w-screen-xl ">
        <article class="mx-auto w-full max-w-4xl format format-sm sm:format-base lg:format-lg format-blue ">
            <header class="mb-4 lg:mb-6 not-format">
                <a href="/posts/" class="font-medium text-blue-500 hover:underline"> &laquo; Back to posts</a>
                <address class="flex items-center mb-6 not-italic">
                    <div class="inline-flex items-center mr-3 text-sm text-gray-900 ">
                        <img class="mr-4 w-16 h-16 rounded-full"
                            src="https://ui-avatars.com/api/?name={{ $post->user->name }}&size=128&background=random"
                            alt="{{ $post->user->name }}">
                        <div>
                            <a href="/posts?author={{ $post->user->username }}" rel="author"
                                class="text-xl font-bold text-gray-900 ">{{ $post->user->name }}</a>

                            <p class="text-base text-gray-500 "><time pubdate datetime="2022-02-08"
                                    title="February 8th, 2022">{{ $post->created_at->diffForHumans() }}</time>
                            </p>
                            <span class="inline text-sm text-gray-500 ">
                                <a href="/posts?category={{ $post->category->slug }}"
                                    class="inline-flex items-center px-2.5 py-0.5 text-xs font-medium text-gray-800 bg-gray-100 rounded ">
                                    <svg class="mr-1 w-3 h-3" fill="currentColor" viewBox="0 0 20 20"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M2 6a2 2 0 012-2h6a2 2 0 012 2v8a2 2 0 01-2 2H4a2 2 0 01-2-2V6zM14.553 7.106A1 1 0 0014 8v4a1 1 0 00.553.894l2 1A1 1 0 0018 13V7a1 1 0 00-1.447-.894l-2 1z">
                                        </path>
                                    </svg>
                                    {{ $post->category->name }}
                                </a>
                            </span>
                        </div>
                    </div>
                </address>
                <h1 class="mb-4 text-3xl font-extrabold leading-tight text-gray-900 lg:mb-6 lg:text-4xl ">
                    {{ $post->title }}</h1>
            </header>
            <div class="not-format">
                {!! $post->body !!}
            </div>

        </article>
    </div>
</x-layout>
