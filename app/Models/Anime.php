<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Anime extends Model
{
    use HasFactory;

    public function categories()
    {
        return $this->belongsToMany(Category::class,
            'categories_has_animes',
            'animes_id',
            'categories_id');
    }
}
