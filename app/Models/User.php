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
        'company_id',
        'first_name',
        'last_name',
        'email',
        'phone',
        'password',
        'phone',
        'active',
        'active_hash',
        'remember_identifier',
        'remember_token',
        'oauth_provider',
        'oauth_uid',
        'gender',
        'locale',
        'picture',
        'link',
        'created_at',
        'updated_at'
    ];

    public function fullName () {
        return $this->first_name . ' ' . $this->last_name;
    }

    public function setPassword($password) {
        $this->update([
            'password'  =>  password_hash($password, PASSWORD_DEFAULT)
        ]);
    }

    public function Company () {
        return Company::find($this->company_id);
    }

    public function companyShort () {
        return
            '<b>' .
            substr($this->Company()->name_short, 0, 1) .
            '</b>' .
            substr($this->Company()->name_short, 1);
    }
    public function companyLong () {
        return
            '<b>' .
            substr($this->Company()->name_full, 0,
                strpos($this->Company()->name_full, ' ')) .
            '</b>' .
            ' ' .
            substr($this->Company()->name_full, (strpos($this->Company()->name_full,' ') + 1));
    }




}