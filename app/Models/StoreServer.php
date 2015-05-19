<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class StoreServer extends Model {

    protected $connection = 'store';
    protected $table = 'servers';
    protected $fillable = [];

    public function items()
    {
        return $this->belongsToMany('App\Models\StoreItem','servers_categories', 'server_id', 'item_id')->withTimestamps();
    }

    public function categories()
    {
        return $this->belongsToMany('App\Models\StoreCategory','servers_categories', 'server_id', 'category_id')->withTimestamps();
    }
}
