<?php namespace App\Models;

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
}
