<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Language extends Model
{
    protected $touches = ['news']; // touch news's timestamps on update

    public function news()
    {
        return $this->belongsToMany(News::class, 'news_language');
    }
}
