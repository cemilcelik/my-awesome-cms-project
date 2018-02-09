<?php

namespace App;

// use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;
use Zizaco\Entrust\Traits\EntrustUserTrait;


class Admin extends Authenticatable
{
	use Notifiable;
	use SoftDeletes { SoftDeletes::restore insteadof EntrustUserTrait; } // todo solve collison
	use EntrustUserTrait;

    protected $table = 'admin';

	protected $fillable = [ 'name', 'surname', 'email', 'password' ];

	protected $hidden = [ 'password' ];

	protected $primaryKey = 'adminId';
}
