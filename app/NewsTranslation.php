<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class NewsTranslation extends Model
{

    protected $fillable = ['title', 'slug', 'description'];

    public $timestamps = false;

}
