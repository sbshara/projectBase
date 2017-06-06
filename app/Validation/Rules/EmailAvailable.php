<?php
/**
 * Created by PhpStorm.
 * User: shiblie
 * Date: 6/6/17
 * Time: 4:16 PM
 */

namespace App\Validation\Rules;

use App\Models\User;
use Respect\Validation\Rules\AbstractRule;

class EmailAvailable extends AbstractRule {

	public function validate ($input) {
		return User::where('email', $input)->count() === 0;
	}

}
