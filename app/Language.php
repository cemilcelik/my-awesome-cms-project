<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Language extends Model
{
    public function news()
    {
        return $this->belongsToMany(News::class, 'news_language');
    }
}
