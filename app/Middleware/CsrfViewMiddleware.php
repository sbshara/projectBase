<?php
/**
 * Created by PhpStorm.
 * User: shiblie
 * Date: 6/6/17
 * Time: 11:00 PM
 */

namespace App\Middleware;


class CsrfViewMiddleware extends Middleware {


    /**
     * @param $request PSR-7
     * @param $response
     * @param $next
     * @return HTML: 2 input:hidden (CSRF NAME & CSRF VALUE)
     */
    public function __invoke ($request, $response, $next) {
        $this
            ->view
            ->getEnvironment()
            ->addGlobal('csrf', [
                'field' =>
                    '<input type="hidden" name="' . $this->csrf->getTokenNameKey() . '" value="' . $this->csrf->getTokenName() . '" id="csrf_name">
                     <input type="hidden" name="' . $this->csrf->getTokenValueKey() . '" value="' .$this->csrf->getTokenValue() .'" id="csrf_value">'
            ]);
        $response = $next($request, $response);
        return $response;
    }

    public function getFailureCallable() {

    }


}