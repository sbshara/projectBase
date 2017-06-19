<?php
/**
 * Created by PhpStorm.
 * User: shiblie
 * Date: 6/17/17
 * Time: 1:26 AM
 */

namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class UserGroup extends Model {

    protected $table = 'usergroups';
    protected $fillable = [
        'id',
        'grp_name',
        'grp_description',
        'grp_type',
        'created_at',
        'updated_at'
    ];
}