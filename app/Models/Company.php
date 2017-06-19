<?php
/**
 * Created by PhpStorm.
 * User: shiblie
 * Date: 6/17/17
 * Time: 1:02 PM
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Company extends Model {
    protected $table = 'companies';
    protected $fillable = [
        'id',
        'name_full',
        'name_short',
        'description',
        'logo',
        'address',
        'pobox',
        'city',
        'phone1',
        'phone2',
        'fax',
        'email',
        'website',
        'license',
        'license_expiry',
        'established',
        'created_at',
        'updated_at'
    ];

    public function CompanyCity () {
        return City::find($this->city);
    }

    public function CompanyState () {
        return State::find($this->CompanyCity()->state_id);
    }

    public function CompanyCountry () {
        return Country::find($this->CompanyState()->cntry_id);
    }
}