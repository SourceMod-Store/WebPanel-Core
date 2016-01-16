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

class StoreLoadout extends Model
{
    protected $connection = 'store';
    protected $table = 'loadouts';
    protected $fillable = ['display_name','game','class','team','privacy','owner_id'];

    public function owner()
    {
        return $this->belongsTo('App\Models\StoreUser','owner_id','id');
    }

    public function subscribers()
    {
        return $this->belongsToMany('App\Models\StoreUser','users_loadouts', 'loadout_id', 'user_id')->withTimestamps();
    }

    public function items()
    {
        return $this->belongsToMany('App\Models\StoreItem','items_loadouts', 'loadout_id', 'item_id')->withTimestamps();
    }

    public function equipped_users()
    {
        return $this->hasMany('App\Models\StoreUser','eqp_loadout_id','id');
    }
}
