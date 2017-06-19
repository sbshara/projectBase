<?php
/**
 * Created by PhpStorm.
 * User: shiblie
 * Date: 6/17/17
 * Time: 1:02 PM
 */

namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class City extends Model {
    protected $table = 'cities';
    protected $fillable = [
        'id',
        'state_id',
        'city_name',
        'city_name_ar',
        'city_code2',
        'city_code3',
        'city_area_code',
        'created_at',
        'updated_at'
    ];
}