<?php
/**
 * Created by PhpStorm.
 * User: shiblie
 * Date: 5/30/17
 * Time: 9:47 PM
 */

namespace App\Validation;

use Respect\Validation\Validator as Respect;
use Respect\Validation\Exceptions\NestedValidationException;

class Validator {

    protected $validationErrors;

    public function validate ($request, array $rules) {

        foreach ($rules as $field => $rule) {
            try {
                $rule->setName(
                    ucfirst(str_replace('_', ' ', $field)))
                    ->assert($request->getParam($field)
                    );
            } catch (NestedValidationException $exception) {
                $this->validationErrors[$field] = $exception->getMessages();
            }
        }
        $_SESSION['validationErrors'] = $this->validationErrors;

        return $this;
    }

    public function failed () {
        return !empty($this->validationErrors);
    }

}
