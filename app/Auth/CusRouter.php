<?php
/**
 * Created by PhpStorm.
 * User: shiblie
 * Date: 6/12/17
 * Time: 1:55 PM
 */

namespace App\Auth;

use App\Models\Router;

class CusRouter {

    /**
     * @param $route
     * @return mixed
     *
     * This should respond with a route (after being requested by user)
     * it would consider the type of the made request ($_GET / $_POST)
     * search the route in the router table, respond with it's callback (class & method)
     *
     */



    public function callBack ($route) {
        $router = Router::where('route', $route)->first();
        return $router->callback();
    }

}