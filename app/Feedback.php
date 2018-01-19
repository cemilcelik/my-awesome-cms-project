<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Feedback extends Model
{
    use SoftDeletes;

    protected $fillable = ['name_surname', 'email', 'message'];

    protected $table = 'feedbacks';
}
