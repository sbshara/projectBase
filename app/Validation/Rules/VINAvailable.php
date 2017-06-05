<?php
/**
 * Created by PhpStorm.
 * User: shiblie
 * Date: 11/9/16
 * Time: 4:16 PM
 */

namespace App\Validation\Rules;
use App\Models\AssetsTrucks;
use Respect\Validation\Rules\AbstractRule;

class VINAvailable extends AbstractRule {

	public function validate($input) {
		return AssetsTrucks::where('vin', $input)->count() === 0;
	}

}
