<?php

namespace App\Http\Controllers;

use App\Models\Articolo;
use App\Http\Requests\ArticoliRequest;
use App\Models\Tag;

class ArticoliController
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $articoli = Articolo::all();
        return view('homepage', compact('articoli'));
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
    public function store(ArticoliRequest $request)
    {
        $titolo = $request->input('titolo');
        $body = $request->input('body');
        $img = null;

        if($request->file('img')){
            $img = $request->file('img')->store('public/img');
        }    

        $articolo = Articolo::create([
            'titolo' => $titolo,
            'body' => $body,
            'img' => $img,
        ]);

        $articolo->tags()->attach($request->tags);

        return redirect()->route('articoli/homepage')->with('success', 'Articolo creato con successo!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Articolo $articolo)
    {
        $tags = Tag::all();
        $articolo->load('tags');
        return view('articoli.detail', compact('articolo'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Articolo $articolo)
    {
        $tags = Tag::all();
        return view('articoli.edit', compact('articolo'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ArticoliRequest $request, Articolo $articolo)
    {
        $request->validate([
            'titolo' => 'required|string|max:255',
            'body' => 'required|string',
            'img' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $articolo->titolo = $request->titolo;
        $articolo->body = $request->body;

        if ($request->hasFile('img')) {
            $articolo->img = $request->file('img')->store('images', 'public');
        }
        $articolo->tags()->sync($request->tags);
        $articolo->save();
        return redirect()->route('articoli/index')->with('success', 'Articolo aggiornato con successo!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Articolo $articolo)
    {
        $articolo->tags()->detach();
        $articolo->delete();
        return redirect()->route('articoli/index')->with('success', 'Articolo eliminato con successo!');
    }
}
