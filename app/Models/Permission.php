<?php
/**
 * Created by PhpStorm.
 * User: shiblie
 * Date: 6/17/17
 * Time: 1:23 AM
 */

namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class Permission extends Model {

    protected $table = 'permissions';
    protected $fillable = [
        'id',
        'route_id',
        'perm_type',
        'perm_auth',
        'created_at',
        'updated_at'
    ];
    
}