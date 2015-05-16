<?php namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class StoreItem extends Model
{
    protected $connection = 'store';
    protected $table = 'items';

    public function users()
    {
        return $this->belongsToMany('App\StoreUser','users_items', 'item_id', 'user_id')->withTimestamps();
    }

}
