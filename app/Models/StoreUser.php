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

    //TODO: Add owned loadouts

    //TODO: Add subscribed loadouts
}
