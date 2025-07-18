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
        $articles = Article::all();
        return view('homepage', compact('articles'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $tags = Tag::all();
        return view('articoli.create', compact('tags'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ArticlesRequest $request)
    {
        $titolo = $request->input('titolo');
        $body = $request->input('body');
        $img = null;

        if($request->file('img')){
            $img = $request->file('img')->store('public/img');
        }    

        $article = Article::create([
            'titolo' => $titolo,
            'body' => $body,
            'img' => $img,
        ]);

        $article->tags()->attach($request->tags);

        return redirect()->route('homepage')->with('message', 'Articolo creato con successo!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Article $article)
    {
        $tags = Tag::all();
        $article->load('tags');
        return view('articoli.detail', compact('article'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Article $article)
    {
        $tags = Tag::all();
        return view('articoli.edit', compact('article', 'tags'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ArticlesRequest $request, Article $article)
    {
        $request->validate([
            'titolo' => 'required|string|max:255',
            'body' => 'required|string',
            'img' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $article->titolo = $request->titolo;
        $article->body = $request->body;

        if ($request->hasFile('img')) {
            $article->img = $request->file('img')->store('images', 'public');
        }
        $article->tags()->sync($request->tags);
        $article->save();
        return redirect()->route('articoli/index')->with('message', 'Articolo aggiornato con successo!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Article $article)
    {
        $article->tags()->detach();
        $article->delete();
        return redirect()->route('articoli/index')->with('success', 'Articolo eliminato con successo!');
    }
}
