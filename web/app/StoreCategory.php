<?php namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class StoreCategory extends Model
{
    protected $connection = 'store';
    protected $table = 'categories';
    protected $fillable = ['priority', 'display_name', 'description', 'require_plugin', 'web_description', 'web_color', 'enable_server_restriction'];

    public function items()
    {
        return $this->hasMany('App\StoreItem','category_id','id');
    }

    public function servers()
    {
        return $this->belongsToMany('App\StoreServer','servers_categories', 'category_id', 'server_id')->withTimestamps();
    }

    public function getServerListAttribute()
    {
        return $this->servers->lists('id');
    }

}
