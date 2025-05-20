<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use Illuminate\Http\Request;
use App\Http\Requests\ArticoliRequest;

class TagsController
{
    /**
     * Store a newly created resource in storage.
     */
    public function store(TagsRequest $request)
    {
        $nome = $request->input('nome');
        }    

        $nome = Tag::create([
            'nome' => $nome,
        ]);
        return redirect()->route('articoli/homepage')->with('success', 'Articolo creato con successo!');
    }

}
