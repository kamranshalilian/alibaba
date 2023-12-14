<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Edit Article') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                <div class="max-w-xl">
                    {{Form::model($article, ['url' => route('article.update',["article" => $article->id]), 'method' => 'PUT', 'files' => true])}}
                    <div class="form-group">
                        {{ Form::label('title', 'title', ['class' => 'block font-medium text-sm text-gray-700 dark:text-gray-300 control-label']) }}
                        {{Form::text('title', $article->title,["class" => 'border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm mt-1 block w-full'])}}
                        <x-input-error class="mt-2" :messages="$errors->get('title')" />
                        {{ Form::label('content', 'content', ['class' => 'block font-medium text-sm text-gray-700 dark:text-gray-300 control-label']) }}
                        {{Form::text('content',$article->content,["class" => 'border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm mt-1 block w-full'])}}
                        <x-input-error class="mt-2" :messages="$errors->get('content')" />
                        {{ Form::label('author', 'author_id', ['class' => 'block font-medium text-sm text-gray-700 dark:text-gray-300 control-label']) }}
                        {{Form::select('author_id', $author, $article->author_id, ["class" => 'border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm mt-1 block w-full','placeholder' => 'Pick a author...'])}}
                        <x-input-error class="mt-2" :messages="$errors->get('author_id')" />
                        {{ Form::label('publication date', 'publication_at', ['class' => 'block font-medium text-sm text-gray-700 dark:text-gray-300 control-label']) }}
                        {{Form::date('publication_at', $article->publication_at, ["class" => 'border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm mt-1 block w-full'])}}
                        <x-input-error class="mt-2" :messages="$errors->get('publication_at')" />
                        {{ Form::label('file', 'file', ['class' => 'block font-medium text-sm text-gray-700 dark:text-gray-300 control-label']) }}
                        {{Form::file('file',null,["class" => 'border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm mt-1 block w-full'])}}
                        <x-input-error class="mt-2" :messages="$errors->get('file')" />
                        <br>
                        {{Form::submit('Send', ["class" => "inline-flex items-center px-4 py-2 bg-red-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-red-500 active:bg-red-700 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150"])}}
                    </div>
                    {{Form::close()}}
                </div>
            </div>


        </div>
    </div>
</x-app-layout>
