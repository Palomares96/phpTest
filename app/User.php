<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Kyslik\ColumnSortable\Sortable;


class User extends Authenticatable
{
    use Notifiable;
    use Sortable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'active'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public $sortable = [
        'id', 'name', 'email', 'created_at', 'updated_at', 'active'
    ];

    /**
     * The projects that belong to the user.
     */
    public function projects()
    {
        return $this->belongsToMany('App\Project', 'project_user', 'user_id', 'project_id')
            ->withPivot('currentlyAssigned')
            ->withTimestamps();
    }
}
