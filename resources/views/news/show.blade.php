@extends('layouts.app')

@section('content')
<article class="max-w-4xl mx-auto">
    <div class="mb-6">
        <a href="{{ route('news.index') }}" class="inline-flex items-center text-sm text-gray-500 hover:text-gray-700">
            <i class="fas fa-arrow-left mr-2"></i> Voltar para notícias
        </a>
    </div>

    <div class="bg-white rounded-lg shadow-sm overflow-hidden">
        <div class="p-8">
            <div class="flex items-center mb-6">
                <span class="inline-flex items-center px-3 py-0.5 rounded-full text-sm font-medium bg-blue-100 text-blue-800">
                    {{ $news->category->name }}
                </span>
                <time datetime="{{ $news->created_at }}" class="ml-auto text-sm text-gray-500">
                    {{ $news->created_at->format('d/m/Y H:i') }}
                </time>
            </div>

            <h1 class="text-3xl font-bold text-gray-900 mb-6">{{ $news->title }}</h1>

            <div class="prose max-w-none">
                {!! nl2br(e($news->content)) !!}
            </div>

            <div class="mt-8 pt-8 border-t border-gray-200">
                <div class="flex items-center justify-between">
                    <div class="flex items-center space-x-4">
                        <span class="text-sm text-gray-500">
                            Última atualização: {{ $news->updated_at->diffForHumans() }}
                        </span>
                    </div>
                    <div class="flex items-center space-x-4">
                        <a href="{{ route('news.edit', $news) }}"
                           class="inline-flex items-center px-4 py-2 border border-gray-300 rounded-md shadow-sm text-sm font-medium text-gray-700 bg-white hover:bg-gray-50">
                            <i class="fas fa-edit mr-2"></i> Editar
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</article>
@endsection
