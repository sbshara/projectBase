<?php
/**
 * Created by PhpStorm.
 * User: shiblie
 * Date: 6/17/17
 * Time: 1:02 PM
 */

namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class Country extends Model {
    protected $table = 'countries';
    protected $fillable = [
        'id',
        'cntry_name_long',
        'cntry_name_short',
        'cntry_name_ar',
        'cntry_iso_2',
        'cntry_iso_3',
        'cntry_phone_code',
        'cntry_flag',
        'created_at',
        'updated_at'
    ];
}