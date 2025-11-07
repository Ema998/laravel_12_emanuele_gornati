<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Http\Requests\ArticlesRequest;
use App\Models\Tag;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $articles = Article::with('tags')->latest()->get();

        return view('homepage', compact('articles'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $tags = Tag::all();
        return view('articoli.articoli-create', compact('tags'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ArticlesRequest $request)
    {
        $data = $request->validated();

        $data['img'] = $request->hasFile('img')
            ? $request->file('img')->store('img', 'public')
            : null;

        $tags = $data['tags'];
        unset($data['tags']);

        $article = Article::create($data);

        $article->tags()->sync($tags);

        return redirect()->route('homepage')->with('message', 'Articolo creato con successo!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Article $article)
    {
        $article->load('tags');

        return view('articoli.articoli-detail', compact('article'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Article $article)
    {
        $tags = Tag::all();
        return view('articoli.articoli-edit', compact('article', 'tags'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ArticlesRequest $request, Article $article)
    {
        $data = $request->validated();

        if ($request->hasFile('img')) {
            $data['img'] = $request->file('img')->store('img', 'public');
        } else {
            unset($data['img']);
        }

        $tags = $data['tags'];
        unset($data['tags']);

        $article->update($data);
        $article->tags()->sync($tags);

        return redirect()->route('homepage')->with('message', 'Articolo aggiornato con successo!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Article $article)
    {
        $article->tags()->detach();
        $article->delete();
        return redirect()->route('homepage')->with('message', 'Articolo eliminato con successo!');
    }
}
