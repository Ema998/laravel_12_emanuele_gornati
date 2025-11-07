<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use App\Http\Requests\TagsRequest;

class TagsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tags = Tag::orderBy('nome')->get();

        return view('tags.tags-index', compact('tags'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(TagsRequest $request)
    {
        $data = $request->validated();

        Tag::create($data);

        return redirect()->route('tags.index')->with('message', 'Tag creato con successo!');
    }

    public function create()
    {
        return view('tags.tags-create');
    }
}


