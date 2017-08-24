<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    public function languages()
    {
        return $this->belongsToMany(Language::class, 'news_language')->withPivot('title', 'description')->wherePivot('code', 'tr');
    }
}
