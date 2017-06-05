<?php
/**
 * Created by PhpStorm.
 * User: shiblie
 * Date: 11/9/16
 * Time: 4:16 PM
 */

namespace App\Validation\Rules;
use App\Models\User;
use Respect\Validation\Rules\AbstractRule;

class UsernameAvailable extends AbstractRule {

	public function validate($input) {
		return User::where('username', $input)->count() === 0;
	}

}
