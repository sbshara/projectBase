<?php
/**
 * Created by PhpStorm.
 * User: shiblie
 * Date: 11/27/16
 * Time: 3:34 PM
 */

namespace App\Validation\Exceptions;

use Respect\Validation\Exceptions\ValidationException;

class OverEighteenException extends ValidationException {

	public static $defaultTemplates = [
		self::MODE_DEFAULT => [
			self::STANDARD  =>  'Date of Birth indicated applicant is under 18!',
		],
	];

}