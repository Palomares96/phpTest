<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;

class Project_user extends Model
{
    use Sortable;

    protected $fillable = [
        'user_id',
        'project_id',
        'currently_assigned',
    ];

    protected $table = 'project_user';

    public $sortable = [
        'id', 'user_name', 'project_name', 'deadline', 'is_currently_assigned', 'is_active', 'created_at', 'updated_at'
    ];

    public function user()
    {
        return $this->hasMany('App\User', 'id', 'user_id');
    }

    public function project()
    {
        return $this->hasMany('App\Project', 'id', 'project_id');
    }
    protected function idSortable($query, $direction)
    {
        return $query->join('projects', 'projects.id', '=', 'project_user.project_id')
            ->join('users', 'users.id', '=', 'project_user.user_id')
            ->where('users.active', '=', '1')
            ->where('projects.active', '=', '1')
            ->orderBy('project_user.id', $direction)
            ->select('project_user.*', 'project_user.currently_assigned as is_currently_assigned', 'projects.name as project_name', 'projects.deadline', 'users.name as user_name', 'users.active as is_active');
    }

    protected function userNameSortable($query, $direction)
    {
        return $query->join('users', 'users.id', '=', 'project_user.user_id')
            ->join('projects', 'projects.id', '=', 'project_user.project_id')
            ->where('users.active', '=', '1')
            ->where('projects.active', '=', '1')
            ->orderBy('users.name', $direction)
            ->select('project_user.*', 'project_user.currently_assigned as is_currently_assigned', 'projects.name as project_name', 'projects.deadline', 'users.name as user_name', 'users.active as is_active');
    }

    protected function projectNameSortable($query, $direction)
    {
        return $query->join('projects', 'projects.id', '=', 'project_user.project_id')
            ->join('users', 'users.id', '=', 'project_user.user_id')
            ->where('users.active', '=', '1')
            ->where('projects.active', '=', '1')
            ->orderBy('projects.name', $direction)
            ->select('project_user.*', 'project_user.currently_assigned as is_currently_assigned', 'projects.name as project_name', 'projects.deadline', 'users.name as user_name', 'users.active as is_active');
    }

    protected function deadlineSortable($query, $direction)
    {
        return $query->join('projects', 'projects.id', '=', 'project_user.project_id')
            ->join('users', 'users.id', '=', 'project_user.user_id')
            ->where('users.active', '=', '1')
            ->where('projects.active', '=', '1')
            ->orderBy('projects.deadline', $direction)
            ->select('project_user.*', 'project_user.currently_assigned as is_currently_assigned', 'projects.name as project_name', 'projects.deadline', 'users.name as user_name', 'users.active as is_active');
    }

    protected function createdAtSortable($query, $direction)
    {
        return $query->join('projects', 'projects.id', '=', 'project_user.project_id')
            ->join('users', 'users.id', '=', 'project_user.user_id')
            ->where('users.active', '=', '1')
            ->where('projects.active', '=', '1')
            ->orderBy('project_user.created_at', $direction)
            ->select('project_user.*', 'project_user.currently_assigned as is_currently_assigned', 'projects.name as project_name', 'projects.deadline', 'users.name as user_name', 'users.active as is_active');
    }

    protected function updatedAtSortable($query, $direction)
    {
        return $query->join('projects', 'projects.id', '=', 'project_user.project_id')
            ->join('users', 'users.id', '=', 'project_user.user_id')
            ->where('users.active', '=', '1')
            ->where('projects.active', '=', '1')
            ->orderBy('project_user.updated_at', $direction)
            ->select('project_user.*', 'project_user.currently_assigned as is_currently_assigned', 'projects.name as project_name', 'projects.deadline', 'users.name as user_name', 'users.active as is_active');
    }

    protected function isCurrentlyAssignedSortable($query, $direction)
    {
        return $query->join('projects', 'projects.id', '=', 'project_user.project_id')
            ->join('users', 'users.id', '=', 'project_user.user_id')
            ->where('users.active', '=', '1')
            ->where('projects.active', '=', '1')
            ->orderBy('project_user.currently_assigned', $direction)
            ->select('project_user.*', 'project_user.currently_assigned as is_currently_assigned', 'projects.name as project_name', 'projects.deadline', 'users.name as user_name', 'users.active as is_active');
    }
    protected function isActiveSortable($query, $direction)
    {
        return $query->join('projects', 'projects.id', '=', 'project_user.project_id')
            ->join('users', 'users.id', '=', 'project_user.user_id')
            ->where('projects.active', '=', '1')
            ->orderBy('users.active', $direction)
            ->select('project_user.*', 'project_user.currently_assigned as is_currently_assigned', 'projects.name as project_name', 'projects.deadline', 'users.active as is_active', 'users.name as user_name');
    }
}
