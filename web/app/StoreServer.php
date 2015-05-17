<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class StoreServer extends Model {

    protected $connection = 'store';
    protected $table = 'servers';
    protected $fillable = [];

}
