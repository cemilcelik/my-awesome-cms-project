<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Dimsav\Translatable\Translatable;

class News extends Model
{
    use Translatable;

    public $translatedAttributes = ['title', 'slug', 'description'];

    protected $fillable = ['title', 'slug', 'description'];

}
