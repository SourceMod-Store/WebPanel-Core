<?php namespace App;

use Zizaco\Entrust\EntrustPermission;

class Permission extends EntrustPermission
{

    public function getRoleListAttribute()
    {
        return $this->roles->lists('id');
    }
}