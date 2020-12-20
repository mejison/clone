<?php

namespace App;

use Zizaco\Entrust\EntrustRole;

class Role extends EntrustRole
{
	public $timestamps = false;

	public function users()
	{
		return $this->hasMany('App\User');
	}
}