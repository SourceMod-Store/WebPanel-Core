<?php namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class StoreUser extends Model
{
    protected $connection = 'store';
    protected $table = 'users';
    protected $fillable = ['auth', 'name', 'credits'];

    public function items()
    {
        return $this->belongsToMany('App\StoreItem','users_items', 'user_id', 'item_id')->withTimestamps();
    }

}
