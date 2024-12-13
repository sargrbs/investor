@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4">
    <div class="grid grid-cols-12 gap-4">
        <div class="col-span-12 md:col-span-8 md:col-start-3 lg:col-span-6 lg:col-start-4">
            <div class="bg-white rounded-lg shadow-sm p-8">
            <h1 class="text-2xl font-bold mb-6">Cadastrar Nova Notícia</h1>

            <form action="{{ route('news.store') }}" method="POST" class="space-y-6">
                @csrf
                <div>
                    <label class="block text-sm font-medium text-gray-700">Título</label>
                    <input type="text" name="title" class="mt-1 block w-full border rounded-lg px-2 py-1">
                    @error('title')
                        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700">Categoria</label>
                    <select name="category_id" class="mt-1 block w-full border rounded-lg px-2 py-1">
                        @foreach($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endforeach
                    </select>
                    @error('category_id')
                        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700">Conteúdo</label>
                    <textarea name="content" rows="6" class="mt-1 block w-full border rounded-lg px-3 py-3"></textarea>
                    @error('content')
                        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <button type="submit" class="w-full py-2 px-4 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                    Cadastrar Notícia
                </button>
            </form>
        </div>
    </div>
</div>
@endsection
