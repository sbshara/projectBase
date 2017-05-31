<?php
/**
 * Created by PhpStorm.
 * User: shiblie
 * Date: 5/30/17
 * Time: 9:44 PM
 */

namespace App\Middleware;


class Middleware {

    protected $container;

    function __construct($container) {
        $this->container = $container;
    }

}
