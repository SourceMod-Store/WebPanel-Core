<?php namespace App;

use Zizaco\Entrust\EntrustRole;

class Role extends EntrustRole
{

    public function getPermissionListAttribute()
    {
        return $this->perms->lists('id');
    }
}