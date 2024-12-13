@extends('layouts.app')

@section('content')
<div class="max-w-4xl mx-auto">
    <div class="mb-6">
        <a href="{{ route('news.show', $news) }}" class="inline-flex items-center text-sm text-gray-500 hover:text-gray-700">
            <i class="fas fa-arrow-left mr-2"></i> Voltar para a notícia
        </a>
    </div>

    <div class="bg-white rounded-lg shadow-sm overflow-hidden">
        <div class="p-8">
            <h1 class="text-2xl font-bold text-gray-900 mb-6">Editar Notícia</h1>

            <form id="newsForm"  action="{{ route('news.update', $news) }}" method="POST"

                x-ref="form"
                x-data="{
                title: '',
                content: '',
                category_id: '',
                errors: {},
                loading: false,
                validateForm() {
                    this.errors = {};

                    if (!this.title.trim()) {
                        this.errors.title = 'O título é obrigatório';
                    } else if (this.title.length < 5) {
                        this.errors.title = 'O título deve ter pelo menos 5 caracteres';
                    }

                    if (!this.category_id) {
                        this.errors.category_id = 'Selecione uma categoria';
                    }

                    if (!this.content.trim()) {
                        this.errors.content = 'O conteúdo é obrigatório';
                    } else if (this.content.length < 10) {
                        this.errors.content = 'O conteúdo deve ter pelo menos 10 caracteres';
                    }

                    return Object.keys(this.errors).length === 0;
                },
                submitForm() {
                    if (this.validateForm()) {
                        this.loading = true;
                        this.$refs.form.submit();
                    }
                }
                }"
                @submit.prevent="submitForm">
                @csrf
                @method('PUT')

                <div class="space-y-6">
                    <div>
                        <label for="title" class="block text-sm font-medium text-gray-700">
                            Título
                        </label>
                        <input type="text" name="title" id="title" value="{{ old('title', $news->title) }}" class="mt-1 block w-full border rounded-lg px-2 py-1">
                        @error('title')
                            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                        @enderror

                        <template x-if="errors.title">
                            <p class="mt-1 text-sm text-red-600" x-text="errors.title"></p>
                        </template>
                    </div>

                    <div>
                        <label for="category_id" class="block text-sm font-medium text-gray-700">
                            Categoria
                        </label>
                        <select name="category_id" id="category_id" class="mt-1 block w-full border rounded-lg px-2 py-1">
                            @foreach($categories as $category)
                                <option value="{{ $category->id }}"
                                    {{ old('category_id', $news->category_id) == $category->id ? 'selected' : '' }}>
                                    {{ $category->name }}
                                </option>
                            @endforeach
                        </select>
                        @error('category_id')
                            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="content" class="block text-sm font-medium text-gray-700">
                            Conteúdo
                        </label>
                        <textarea name="content" id="content" rows="10" class="mt-1 block w-full border rounded-lg px-3 py-3">{{ old('content', $news->content) }}</textarea>
                        @error('content')
                            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="flex justify-end pt-6">
                        <a href="{{ route('news.show', $news) }}" class="bg-white py-2 px-4 border border-gray-300 rounded-md shadow-sm text-sm font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                            Cancelar
                        </a>
                        <button type="submit" class="ml-3 inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                            Salvar Alterações
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
