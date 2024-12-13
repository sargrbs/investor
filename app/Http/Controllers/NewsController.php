<?php

namespace App\Http\Controllers;

use App\Models\News;
use App\Models\Category;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    public function index(Request $request)
    {
        $query = News::with('category');

        if ($request->has('search')) {
            if($request->search !== null) {
                $query->where('title', 'like', '%' . $request->search . '%');
            }
        }

        if ($request->has('category')) {
            if($request->category !== null) {
                $query->whereHas('category', function ($q) use ($request) {
                    $q->where('id', $request->category);
                });
            }
        }

        $news = $query->latest()->paginate(10);
        $categories = Category::all();

        return view('news.index', compact('news', 'categories'));
    }

    public function create()
    {
        $categories = Category::all();
        return view('news.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|min:5|max:255',
            'content' => 'required|min:10',
            'category_id' => 'required|exists:categories,id',
        ], [
            'title.required' => 'O título é obrigatório',
            'title.min' => 'O título deve ter pelo menos 5 caracteres',
            'content.required' => 'O conteúdo é obrigatório',
            'content.min' => 'O conteúdo deve ter pelo menos 10 caracteres',
            'category_id.required' => 'Selecione uma categoria',
            'category_id.exists' => 'Categoria inválida',
        ]);

        News::create($validated);

        return redirect()->route('news.index')
            ->with('success', 'Notícia criada com sucesso!');
    }

    public function show(News $news)
    {
        return view('news.show', compact('news'));
    }

    public function edit(News $news)
    {
        $categories = Category::all();
        return view('news.edit', compact('news', 'categories'));
    }

    public function update(Request $request, News $news)
    {
        $validated = $request->validate([
            'title' => 'required|min:5|max:255',
            'content' => 'required|min:10',
            'category_id' => 'required|exists:categories,id',
        ], [
            'title.required' => 'O título é obrigatório',
            'title.min' => 'O título deve ter pelo menos 5 caracteres',
            'content.required' => 'O conteúdo é obrigatório',
            'content.min' => 'O conteúdo deve ter pelo menos 10 caracteres',
            'category_id.required' => 'Selecione uma categoria',
            'category_id.exists' => 'Categoria inválida',
        ]);

        $news->update($validated);

        return redirect()
            ->route('news.show', $news)
            ->with('success', 'Notícia atualizada com sucesso!');
    }
}
