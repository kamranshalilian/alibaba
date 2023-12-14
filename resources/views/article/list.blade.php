<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <a href="{{route('article.create')}}"
                       class="inline-flex items-center px-4 py-2 bg-gray-800 dark:bg-gray-200 border border-transparent rounded-md font-semibold text-xs text-white dark:text-gray-800 uppercase tracking-widest hover:bg-gray-700 dark:hover:bg-white focus:bg-gray-700 dark:focus:bg-white active:bg-gray-900 dark:active:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150">
                        Add
                    </a>
                    <br>
                    <br>
                    <table
                        class="hover:border-collapse table-auto border-separate border-spacing-2 border border-slate-500">
                        <thead>
                        <tr>
                            <th class="border border-slate-600">#</th>
                            <th class="border border-slate-600">title</th>
                            <th class="border border-slate-600">content</th>
                            <th class="border border-slate-600">publication data</th>
                            <th class="border border-slate-600">author</th>
                            <th class="border border-slate-600">file</th>
                            <th class="border border-slate-600">edit</th>
                            <th class="border border-slate-600">delete</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($articles as $article)
                            <tr>
                                <td class="border border-slate-600">{{$loop->index + 1}}</td>
                                <td class="border border-slate-600">{{$article->title}}</td>
                                <td class="border border-slate-600">{{$article->content}}</td>
                                <td class="border border-slate-600">{{$article->publication_at}}</td>
                                <td class="border border-slate-600">{{$article->author->name}}</td>
                                <td class="border border-slate-600">
                                    @if(\Illuminate\Support\Facades\Storage::has($article->file))
                                        <a href="{{\Illuminate\Support\Facades\Storage::url($article->file)}}"
                                           class="inline-flex items-center px-4 py-2 bg-gray-800 dark:bg-gray-200 border border-transparent rounded-md font-semibold text-xs text-white dark:text-gray-800 uppercase tracking-widest hover:bg-gray-700 dark:hover:bg-white focus:bg-gray-700 dark:focus:bg-white active:bg-gray-900 dark:active:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150">
                                            file
                                        </a>
                                    @endif
                                </td>
                                <td class="border border-slate-600">
                                    <a href="{{route('article.edit',['article' => $article->id])}}"
                                       class="inline-flex items-center px-4 py-2 bg-gray-800 dark:bg-gray-200 border border-transparent rounded-md font-semibold text-xs text-white dark:text-gray-800 uppercase tracking-widest hover:bg-gray-700 dark:hover:bg-white focus:bg-gray-700 dark:focus:bg-white active:bg-gray-900 dark:active:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150">
                                        edit
                                    </a>
                                </td>
                                <td class="border border-slate-600">
                                    {{Form::open(['url' => route('article.destroy', ['article' => $article->id]), 'method' => 'delete'])}}
                                    {{Form::submit('Delete',["class" => "inline-flex items-center px-4 py-2 bg-red-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-red-500 active:bg-red-700 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150"])}}
                                    {{Form::close()}}
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
