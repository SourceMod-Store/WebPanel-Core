<?php namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class StoreCategory extends Model {

    use SoftDeletes;

    protected $connection = 'store';
    protected $table = 'categories';

}
