<?php
/**
 * Created by PhpStorm.
 * User: shiblie
 * Date: 6/17/17
 * Time: 1:29 AM
 */

namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class UserPermission extends Model {

    protected $table = 'map_user_permissions';
    protected $fillable = [
        'id',
        'user_id',
        'perm_id',
        'usr_grp',
        'created_at',
        'updated_at'
    ];
}