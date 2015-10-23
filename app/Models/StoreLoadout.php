<?php namespace App\Models;

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
