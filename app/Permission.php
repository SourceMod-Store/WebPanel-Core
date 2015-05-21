<?php namespace App;

use Zizaco\Entrust\EntrustPermission;

class Permission extends EntrustPermission
{

    protected $fillable = ['name', 'display_name', 'description'];

    public function getRoleListAttribute()
    {
        return $this->roles->lists('id');
    }
}