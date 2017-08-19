<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class NewsTranslation extends Model
{

    use Sluggable;

    protected $fillable = ['title', 'slug', 'description'];

    public $timestamps = false;

    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ]; 
    }

}
