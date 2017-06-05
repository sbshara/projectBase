<?php
/**
 * Created by PhpStorm.
 * User: shiblie
 * Date: 6/5/17
 * Time: 7:24 PM
 */

namespace App\Middleware;

class Middleware {

    protected $container;

    function __construct($container) {
        $this->container = $container;
    }

}
