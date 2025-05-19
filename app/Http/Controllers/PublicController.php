<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Articolo;

class PublicController
{
    public function homepage()
    {
        return view('homepage');
    }

    public function articoliCreate()
    {
        return view('articoli.create');
    }

    public function articoliDetail(Articolo $articolo)
    {
        return view('articoli.detail', compact('articolo'));
    }

    public function articoliUpdate(Articolo $articolo)
    {
        return view('articoli.edit', compact('articolo'));
    }


}
