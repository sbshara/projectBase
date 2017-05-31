<?php
/**
 * Created by PhpStorm.
 * User: shiblie
 * Date: 5/30/17
 * Time: 11:14 PM
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class User extends Model {

    public $table = 'users';
    public $fillable = [
        'id',
        'first_name',
        'last_name',
        'username',
        'email',
        'phone',
        'active',
        'active_hash',
        'remember_identifier',
        'remember_token'
    ];

    public function fullName () {
        return $this->first_name . ' ' . $this->last_name;
    }








}