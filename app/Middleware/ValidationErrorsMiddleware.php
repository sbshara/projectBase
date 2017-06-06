<?php
/**
 * Created by PhpStorm.
 * User: shiblie
 * Date: 6/5/17
 * Time: 7:25 PM
 */

namespace App\Middleware;

class ValidationErrorsMiddleware extends Middleware {

    public function __invoke ($request, $response, $next) {
        $this
            ->view
            ->getEnvironment()
            ->addGlobal(
                'validationErrors',
                isset($_SESSION['validationErrors']) ? $_SESSION['validationErrors'] : null
            );

        unset($_SESSION['validationErrors']);

        $response = $next($request, $response);
        return $response;
    }

}