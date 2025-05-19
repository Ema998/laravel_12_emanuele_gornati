<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Game extends Model
{
    protected $fillable = [
        'nome',
        'prezzo',
        'descrizione',
        'img',
        'user_id'
    ];

    public function users()
    {
        return $this->belongsTo(User::class);
    }
}
