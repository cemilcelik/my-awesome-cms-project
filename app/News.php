<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Scopes\ActiveScope;
use Illuminate\Http\Request;

class News extends Model
{
    use SoftDeletes;

    protected $dates = ['deleted_at'];

    protected static function boot()
    {
        parent::boot();

        if (app()->request->segment(1) != 'admin') {
            static::addGlobalScope(new ActiveScope);
        }
    }

    public function getSlugAttribute() : string
    {
        return str_slug($this->language[0]->pivot->title);
    }

    public function getUrlAttribute() : string
    {
        return action('NewsController@show', [$this->id, $this->slug]);
    }
    
    public function languages()
    {
        return $this->belongsToMany(Language::class, 'news_language')->withPivot('title', 'description');
    }

    public function language()
    {
        return $this->belongsToMany(Language::class, 'news_language')->withPivot('title', 'description')->where('code', config('app.locale'));
    }

    public function medias()
    {
        return $this->morphToMany(Media::class, 'mediable');
    }
}
