<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;

class Project extends Model
{
    use Sortable;
    //
    protected $fillable = [
        'name',
        'desc',
        'deadline',
        'active'
    ];

    protected $table = 'projects';

    public $sortable = [
        'id', 'name', 'desc', 'deadline', 'created_at', 'updated_at', 'active'
    ];

    public function users()
    {
        return $this->belongsToMany('App\User', 'project_user', 'project_id', 'user_id')
            ->withPivot('currentlyAssigned')
            ->withTimestamps();
    }
}
