<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-wrap justify-between">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Article Lists') }}
            </h2>
            @if (session('success'))
                <p class="text-green-700 font-semibold">{{ session('success') }}</p>
            @endif
            <a href="{{ route('articles.create') }}" class="inline-block px-4 py-2 leading-none text-white bg-blue-500 hover:bg-blue-600 rounded">Add Article</a>
        </div>

    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="mt-6">
                    <div class="relative overflow-x-auto mb-4">
                        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                <tr>
                                    <th scope="col" class="px-6 py-3">
                                        Serial
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Title
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Description
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        User
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Category
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Tags
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Action
                                    </th>
                                </tr>
                            </thead>
                            <tbody>

                            @if ($articles->count())
                            @php $i = 1; @endphp
                            @foreach ($articles as $article)
                                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                        {{ $i }}
                                    </th>
                                    <td class="px-6 py-4">
                                        {{ $article->title }}
                                    </td>
                                    <td class="px-6 py-4">
                                        {{ $article->description }}
                                    </td>
                                    <td class="px-6 py-4">
                                        {{ $article->user->name }}
                                    </td>
                                    <td class="px-6 py-4">
                                        {{ $article->category->name }}
                                    </td>
                                    <td class="px-6 py-4">
                                        {{ getNames($article->tags) }}
                                    </td>
                                    <td class="p-0">
                                        <div class="flex items-center justify-center p-5">
                                            @can('delete',$article)
                                            <a class="inline-flex w-8 h-8 mr-2 items-center justify-center bg-green-500 hover:bg-green-600 rounded-2xl"
                                               href="{{ route('articles.edit', $article->id) }}">
                                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="20"
                                                     height="20">
                                                    <path fill="none" d="M0 0h24v24H0z"/>
                                                    <path
                                                        d="M15.728 9.686l-1.414-1.414L5 17.586V19h1.414l9.314-9.314zm1.414-1.414l1.414-1.414-1.414-1.414-1.414 1.414 1.414 1.414zM7.242 21H3v-4.243L16.435 3.322a1 1 0 0 1 1.414 0l2.829 2.829a1 1 0 0 1 0 1.414L7.243 21z"
                                                        fill="rgba(255,255,255,1)"/>
                                                </svg>
                                            </a>
                                            <form action="{{ route('articles.destroy',$article->id) }}" method="POST" >
                                                @csrf
                                                @method('DELETE')
                                                <button
                                                        class="delete-item-btn inline-flex w-8 h-8 items-center justify-center bg-red-500 hover:bg-red-600 rounded-2xl">
                                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="20"
                                                        height="20">
                                                        <path fill="none" d="M0 0h24v24H0z"/>
                                                        <path
                                                            d="M12 10.586l4.95-4.95 1.414 1.414-4.95 4.95 4.95 4.95-1.414 1.414-4.95-4.95-4.95 4.95-1.414-1.414 4.95-4.95-4.95-4.95L7.05 5.636z"
                                                            fill="rgba(255,255,255,1)"/>
                                                    </svg>
                                                </button>
                                            </form>
                                            @endcan

                                        </div>
                                    </td>
                                </tr>
                                @php $i++; @endphp
                            @endforeach
                            @endif

                            </tbody>
                        </table>
                    </div>
                    <div class="r-pagi">{{ $articles->links() }}</div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
