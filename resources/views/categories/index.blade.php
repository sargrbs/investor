@extends('layouts.app')

@section('content')
    <div class="max-w-2xl mx-auto">
        <h1 class="text-2xl font-bold mb-6">Gerenciar Categorias</h1>

        <form action="{{ route('categories.store') }}" method="POST" class="mb-8">
            @csrf
            <div class="flex gap-4">
                <input type="text" name="name" placeholder="Nome da categoria"
                       class="flex-1 px-4 py-2 border rounded-lg">
                @error('name')
                    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                @enderror
                <button type="submit" class="px-6 py-2 bg-blue-500 text-white rounded-lg hover:bg-blue-600">
                    Adicionar
                </button>
            </div>
        </form>

        <div class="bg-white rounded-lg shadow">
            <div class="divide-y">
                @foreach($categories as $category)
                    <div class="p-4 flex justify-between items-center">
                        <span class="font-medium">{{ $category->name }}</span>
                        <span class="text-sm text-gray-500">{{ $category->news->count() }} notícias</span>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
