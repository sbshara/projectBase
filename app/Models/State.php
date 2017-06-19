<?php
/**
 * Created by PhpStorm.
 * User: shiblie
 * Date: 6/17/17
 * Time: 1:02 PM
 */

namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class State extends Model {

    protected $table = 'states';
    protected $fillable = [
        'id',
        'cntry_id',
        'state_name',
        'state_name_ar',
        'state_code2',
        'state_code3',
        'state_area_code',
        'created_at',
        'updated_at'
    ];
}