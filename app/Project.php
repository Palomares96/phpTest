<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    //
    protected $fillable = [
        'name',
        'desc',
        'deadline',
        'active'
    ];

    protected $table = 'projects';

    public function project()
    {
        return $this->belongsToMany('App\User', 'project_user', 'project_id', 'user_id')
            ->as('assigned')
            ->withPivot('active')
            ->withTimestamps();
    }
}
