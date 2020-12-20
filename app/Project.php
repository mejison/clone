<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    public function files()
    {
    	return $this->toMany("App\ProjectFile", "id", "projects_id");
    }

    public function tags()
    {
    	return $this->toMany("App\ProjectTag", "id", "projects_id");
    }
}
