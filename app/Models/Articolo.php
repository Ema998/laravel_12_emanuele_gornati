<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Articolo extends Model
{
    protected $fillable = [
        'nome',
        'tags',
        'body',
        'img'
    ];

    public function users()
    {
        return $this->belongsTo(User::class);
    }
}
