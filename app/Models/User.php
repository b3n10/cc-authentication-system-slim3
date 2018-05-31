<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class User extends Model {

	// specify which table to use
	// by default Eloquent will find and use a table based on the name of class in plural form
	// class 'User', table will be 'Users' or 'users'
	protected $table = 'users';

	// specify which cols to use
	protected $fillable = [
		'name',
		'email',
		'password'
	];

}
