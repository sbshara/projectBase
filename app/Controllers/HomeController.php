<?php
/**
 * Created by PhpStorm.
 * User: shiblie
 * Date: 5/30/17
 * Time: 8:51 PM
 */

namespace App\Controllers;

use App\Controllers\Controller;


class HomeController extends Controller {

    public function index ($request, $response, $args) {
        return $this->view->render($response, 'home.twig');
    }


}