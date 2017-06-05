<?php
/**
 * Created by PhpStorm.
 * User: shiblie
 * Date: 11/13/16
 * Time: 3:55 PM
 */

namespace App\Validation\Exceptions;

use Respect\Validation\Exceptions\ValidationException;

class MatchesPasswordException  extends ValidationException {

	public static $defaultTemplates = [
		self::MODE_DEFAULT  =>  [
			self::STANDARD  =>  'Password does not match.'
		]
	];
}
