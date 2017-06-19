<?php
/**
 * Created by PhpStorm.
 * User: shiblie
 * Date: 6/17/17
 * Time: 1:31 AM
 */

namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class UserGroupPermission extends Model {

    protected $table = 'map_user_groups_permissions';
    protected $fillable = [
        'id',
        'grp_id',
        'perm_id',
        'created_at',
        'updated_at'
    ];
}