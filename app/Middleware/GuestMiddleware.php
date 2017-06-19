<?php
/**
 * Created by PhpStorm.
 * User: shiblie
 * Date: 6/6/17
 * Time: 11:00 PM
 */

namespace App\Middleware;


class GuestMiddleware extends Middleware {


    /**
     * @param $request PSR-7
     * @param $response
     * @param $next
     * @return HTML: 2 input:hidden (CSRF NAME & CSRF VALUE)
     */
    public function __invoke ($request, $response, $next) {
        if ($this->container->auth->check()) {
            $this->container->flash->addMessage('error', 'You\'re already logged in.');
            // TODO: if we have the referrer url, it's better to redirect the user to the referrer after signing in
            return $response->withRedirect($this->container->router->pathFor('private.home'));
        }
        $response = $next($request, $response);
        return $response;
    }


}