<?php namespace App\Models;

//Copyright (c) 2015 "Werner Maisl"
//
//This file is part of the Store Webpanel V2.
//
//The Store Webpanel V2 is free software: you can redistribute it and/or modify
//it under the terms of the GNU Affero General Public License as
//published by the Free Software Foundation, either version 3 of the
//License, or (at your option) any later version.
//
//This program is distributed in the hope that it will be useful,
//but WITHOUT ANY WARRANTY; without even the implied warranty of
//MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
//GNU Affero General Public License for more details.
//
//You should have received a copy of the GNU Affero General Public License
//along with this program. If not, see <http://www.gnu.org/licenses/>.

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class StoreUser extends Model
{
    protected $connection = 'store';
    protected $table = 'users';
    protected $fillable = ['auth', 'name', 'credits'];

    public function items()
    {
        return $this->belongsToMany('App\Models\StoreItem','users_items', 'user_id', 'item_id')->withTimestamps();
    }

    public function owned_loadouts()
    {
        return $this->hasMany('App\Models\StoreLoadout','owner_id','id');
    }

    public function subscribed_loadouts()
    {
        return $this->belongsToMany('App\Models\StoreLoadout','users_loadouts', 'user_id', 'loadout_id')->withTimestamps();
    }

    public function equipped_loadout()
    {
        return $this->belongsTo('App\Models\StoreLoadout','eqp_loadout_id','id');
    }
}
