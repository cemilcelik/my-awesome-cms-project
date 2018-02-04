<?php

namespace App;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Admin extends Authenticatable
{
	use Notifiable;
	use SoftDeletes;

    protected $table = 'admin';

	protected $fillable = [ 'name', 'surname', 'email', 'password' ];

	protected $hidden = [ 'password' ];

	protected $primaryKey = 'adminId';
}
