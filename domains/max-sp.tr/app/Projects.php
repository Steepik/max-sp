<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Projects extends Model
{
    protected $guarded = [];

    public function scopeAdminProjects($query)
    {
        return $query->where('admin', 1)->orderBy('id', 'desc');
    }

    public function user()
    {
        return $this->hasOne(User::class, 'id', 'user_id');
    }

    public function documents()
    {
        return $this->hasMany(Documents::class, 'project_id', 'id');
    }

    public function photos()
    {
        return $this->hasMany(Photos::class, 'project_id', 'id');
    }
}
