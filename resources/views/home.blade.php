@extends('layouts.app_frontend')
@section('content')
<section>
    <div class="relative items-center w-full px-5 py-12 mx-auto md:px-12 lg:px-24 max-w-7xl">
        <div class="grid w-full grid-cols-1 gap-6 mx-auto lg:grid-cols-3">
            @foreach ($articles as $article)
            <div class="p-6">
                <img class="object-cover object-center w-full mb-8 lg:h-48 md:h-36 rounded-xl" src="https://via.placeholder.com/150" alt="blog">
                <h1 class="mx-auto mb-8 text-2xl font-semibold leading-none tracking-tighter text-neutral-600 lg:text-3xl">{{ $article->title }}</h1>
                <p class="mx-auto text-base leading-relaxed text-gray-500">{{ $article->description }}</p>
                <div class="mt-4">
                    <a href="{{ route('article_detail',$article->id) }}" class="inline-flex items-center mt-4 font-semibold text-blue-600 lg:mb-0 hover:text-neutral-600" title="read more"> Read More » </a>
                </div>
            </div>
            @endforeach

        </div>
    </div>
</section>
@endsection
