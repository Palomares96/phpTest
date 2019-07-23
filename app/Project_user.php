<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project_user extends Model
{
    protected $fillable = [
        'user_id',
        'project_id',
        'active'
    ];

    protected $table = 'project_user';

    public function project()
    {
        return $this->withTimestamps();
    }
}
