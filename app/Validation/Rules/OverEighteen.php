<?php
/**
 * Created by PhpStorm.
 * User: shiblie
 * Date: 11/27/16
 * Time: 3:33 PM
 */

namespace App\Validation\Rules;

use Respect\Validation\Rules\AbstractRule;

class OverEighteen extends AbstractRule {

	public function validate($birthday, $age = 18) {
		// $birthday can be UNIX_TIMESTAMP or just a string-date.
		if(is_string($birthday)) {
			$birthday = strtotime($birthday);
		}
		// check --  31536000 is the number of seconds in a 365 days year.
		if(time() - $birthday < $age * 31536000)  {
			return false;
		}
		return true;
	}


}