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

class StoreItem extends Model
{
    protected $connection = 'store';
    protected $table = 'items';
    protected $fillable = ['priority','name','display_name','description','web_description','type','loadout_slot','price','category_id','attrs','is_buyable','is_tradeable','is_refundable','expiry_time','flags','enable_server_restriction'];

    public function users()
    {
        return $this->belongsToMany('App\Models\StoreUser','users_items', 'item_id', 'user_id')->withTimestamps();
    }

    public function servers()
    {
        return $this->belongsToMany('App\Models\StoreServer','servers_items', 'item_id', 'server_id')->withTimestamps();
    }

    public function category()
    {
        return $this->belongsTo('App\Models\StoreCategory','category_id','id');
    }

    public function getServerListAttribute()
    {
        return $this->servers->lists('id');
    }
}
