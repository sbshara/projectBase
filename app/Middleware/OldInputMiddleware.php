<?php
/**
 * Created by PhpStorm.
 * User: shiblie
 * Date: 6/5/17
 * Time: 11:18 PM
 */

namespace App\Middleware;


class OldInputMiddleware extends Middleware {

    public function __invoke($request, $response, $next) {
        $this->container->view
            ->getEnvironment()
            ->addGlobal(
                'oldInput',
                isset($_SESSION['oldInput']) ? $_SESSION['oldInput'] : null
            );

        $_SESSION['oldInput'] = $request->getParams();
        $response = $next($request, $response);
        return $response;
    }

}