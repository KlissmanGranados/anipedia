<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    public function animes(){
        return $this->belongsToMany(Anime::class,
            'categories_has_animes',
            'categories_id',
            'animes_id');
    }
}
