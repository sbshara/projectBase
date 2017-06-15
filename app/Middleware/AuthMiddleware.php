<?php
/**
 * Created by PhpStorm.
 * User: shiblie
 * Date: 6/6/17
 * Time: 11:00 PM
 */

namespace App\Middleware;


class AuthMiddleware extends Middleware {


    /**
     * @param $request PSR-7
     * @param $response
     * @param $next
     * @return HTML: 2 input:hidden (CSRF NAME & CSRF VALUE)
     */
    public function __invoke ($request, $response, $next) {
        if (!$this->container->auth->check()) {
            $this->container->flash->addMessage('error', 'Please sign in to continue.');
            // TODO: if we have the referrer url, it's better to redirect the user to the referrer after signing in
            return $response->withRedirect($this->container->router->pathFor('auth.SignIn'));
        }
        $response = $next($request, $response);
        return $response;
    }


}