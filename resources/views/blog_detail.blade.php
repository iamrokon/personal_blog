@extends('layouts.app_frontend')
@section('content')
<section>
    <div class="relative items-center w-full px-5 py-12 mx-auto md:px-12 lg:px-24 max-w-7xl">
        <div class="grid w-full grid-cols-1 gap-6 mx-auto">
            <div class="p-6 flex justify-between">
                <img class="object-cover object-center w-2/5 mb-8 lg:h-48 md:h-36 rounded-xl" src="https://via.placeholder.com/150" alt="blog">
                <div class="ml-20">
                    <h1 class="mx-auto mb-2 text-xl font-semibold leading-none tracking-tighter text-neutral-600 lg:text-xl">By: {{ $article->user->name }} {{ $article->created_at->diffForHumans() }}</h1>
                    <h1 class="mx-auto mb-8 text-2xl font-semibold leading-none tracking-tighter text-neutral-600 lg:text-3xl">{{ $article->title }}</h1>
                    <p class="mx-auto text-base leading-relaxed text-gray-500">{{ $article->description }}</p>
                    <p class="mx-auto text-base font-semibold leading-relaxed text-gray-500">Category: {{ $article->category->name }} Tags: {{ getNames($article->tags) }}</p>
                </div>
                {{-- <div class="mt-4">
                    <a href="{{ route('article_detail',$article->id) }}" class="inline-flex items-center mt-4 font-semibold text-blue-600 lg:mb-0 hover:text-neutral-600" title="read more"> Read More » </a>
                </div> --}}
            </div>

        </div>
    </div>
</section>
@endsection




