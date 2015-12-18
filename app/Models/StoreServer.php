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

class StoreServer extends Model {

    protected $connection = 'store';
    protected $table = 'servers';
    protected $fillable = ['name','display_name', 'ip', 'port'];

    public function items()
    {
        return $this->belongsToMany('App\Models\StoreItem','servers_categories', 'server_id', 'item_id')->withTimestamps();
    }

    public function categories()
    {
        return $this->belongsToMany('App\Models\StoreCategory','servers_categories', 'server_id', 'category_id')->withTimestamps();
    }
}
