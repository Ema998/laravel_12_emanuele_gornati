<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use App\Http\Requests\TagsRequest;

class TagsController
{
    /**
     * Store a newly created resource in storage.
     */
    public function store(TagsRequest $request)
    {
        $nome = $request->input('nome');

        $tag = Tag::create([
            'nome' => $nome,
        ]);

        $tag->save();

        return redirect()->route('articoli/homepage')->with('message', 'Tag creato con successo!');
    }
}


