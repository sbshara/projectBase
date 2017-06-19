<?php
/**
 * Created by PhpStorm.
 * User: shiblie
 * Date: 6/15/17
 * Time: 8:33 PM
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Router extends Model {

    protected $table = 'app_router';
    protected $fillable = [
        'id',
        'route',
        'callback',
        'name',
        'readable_name',
        'created_at',
        'updated_at'
    ];


}