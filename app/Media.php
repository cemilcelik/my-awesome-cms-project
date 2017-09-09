<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Media extends Model
{
    use softDeletes;

    protected $table = 'medias';

    public function news()
    {
        return $this->morphedByMany(News::class, 'mediable');
    }

    public function languages()
    {
        return $this->belongsToMany(Language::class, 'media_language')->withPivot('title');
    }

    public function language()
    {
        return $this->belongsToMany(Language::class, 'media_language')->withPivot('title')->where('code', config('app.locale'));
    }
}
