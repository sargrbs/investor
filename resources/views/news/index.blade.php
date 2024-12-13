@extends('layouts.app')

@section('content')
<div x-data="{ showFilters: false }" class="px-20 py-8">
    <!-- Header Section -->
    <div class="md:flex md:items-center md:justify-between mb-6">
        <div class="flex-1 min-w-0">
            <h2 class="text-2xl font-bold leading-7 text-gray-900 sm:text-3xl sm:truncate">
                Últimas Notícias
            </h2>
        </div>
        <div class="mt-4 flex md:mt-0 md:ml-4">
            <button @click="showFilters = !showFilters"
                    class="ml-3 inline-flex items-center px-4 py-2 border border-gray-300 rounded-md shadow-sm text-sm font-medium text-gray-700 bg-white hover:bg-gray-50">
                <i class="fas fa-filter mr-2"></i> Filtros
            </button>
            <a href="{{ route('news.create') }}"
               class="ml-3 inline-flex items-center px-4 py-2 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-blue-600 hover:bg-blue-700">
                <i class="fas fa-plus mr-2"></i> Nova Notícia
            </a>
        </div>
    </div>

    <!-- Filters Section -->
    <div x-show="showFilters"
         x-transition:enter="transition ease-out duration-200"
         x-transition:enter-start="opacity-0 transform -translate-y-2"
         x-transition:enter-end="opacity-100 transform translate-y-0"
         x-transition:leave="transition ease-in duration-150"
         x-transition:leave-start="opacity-100 transform translate-y-0"
         x-transition:leave-end="opacity-0 transform -translate-y-2"
         class="bg-white p-4 rounded-lg shadow-sm mb-6">
        <form action="{{ route('news.index') }}" method="GET">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                <div>
                    <label for="search" class="block text-sm font-medium text-gray-700">Buscar</label>
                    <input type="text" name="search" id="search"
                           class="mt-1 block w-full rounded-md border rounded-lg px-3 py-1"
                           placeholder="Título da notícia..."
                           value="{{ request('search') }}">
                </div>
                <div>
                    <label for="category" class="block text-sm font-medium text-gray-700">Categoria</label>
                    <select name="category" id="category"
                            class="mt-1 block w-full rounded-md border rounded-lg px-3 py-1">
                        <option value="">Todas as categorias</option>
                        @foreach($categories as $category)
                            <option value="{{ $category->id }}" {{ request('category') == $category->id ? 'selected' : '' }}>
                                {{ $category->name }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="flex items-end">
                    <button type="submit"
                            class="w-full inline-flex justify-center py-2 px-4 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                        <i class="fas fa-search mr-2"></i> Buscar
                    </button>
                </div>
            </div>
        </form>
    </div>

    <!-- News Grid -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        @forelse($news as $item)
            <article class="bg-white rounded-lg shadow-sm overflow-hidden hover:shadow-md transition-shadow duration-300">
                <div class="p-6">
                    <div class="flex items-center mb-4">
                        <span class="inline-flex items-center px-3 py-0.5 rounded-full text-sm font-medium bg-blue-100 text-blue-800">
                            {{ $item->category->name }}
                        </span>
                        <time datetime="{{ $item->created_at }}" class="ml-auto text-sm text-gray-500">
                            {{ $item->created_at->format('d/m/Y') }}
                        </time>
                    </div>
                    <h3 class="text-xl font-semibold text-gray-900 mb-2">{{ $item->title }}</h3>
                    <p class="text-gray-600 mb-4 line-clamp-3">
                        {{ Str::limit($item->content, 150) }}
                    </p>
                    <div class="flex items-center justify-between">
                        <a href="{{ route('news.show', $item) }}"
                           class="inline-flex items-center text-sm font-medium text-blue-600 hover:text-blue-500">
                            Ler mais <i class="fas fa-arrow-right ml-2"></i>
                        </a>
                    </div>
                </div>
            </article>
        @empty
            <div class="col-span-full">
                <div class="text-center py-12 bg-white rounded-lg">
                    <i class="fas fa-newspaper text-4xl text-gray-400 mb-4"></i>
                    <h3 class="text-lg font-medium text-gray-900 mb-2">Nenhuma notícia encontrada</h3>
                    <p class="text-gray-500">Tente ajustar seus filtros ou criar uma nova notícia.</p>
                </div>
            </div>
        @endforelse
    </div>

    <!-- Pagination -->
    <div class="mt-6">
        {{ $news->links() }}
    </div>
</div>
@endsection
