<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('User Posts') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="mt-6">
                    @if ($posts->count())
                    @foreach ($posts as $post)
                    <div class="mb-4">
                        {{ $post->id }} - <a class="font-medium" href="{{ route('users.user.post',$post->user_id)}} ">{{ $post->user->name }}</a><span class="text-sm text-gray-600"> {{ $post->created_at->diffForHumans() }}</span>
                        <p>{{ $post->body }}</p>
                        @can('delete',$post)
                        <form action="{{ route('post.destroy',$post->id) }}" method="POST" >
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-600">Delete Post</button>
                        </form>
                        @endcan
                        {{-- @endif --}}
                    </div>
                    @endforeach
                    <div>{{ $posts->links() }}</div>
                    @else
                        <p>There are no posts</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
