<?php
/**
 * Created by PhpStorm.
 * User: shiblie
 * Date: 5/31/17
 * Time: 11:30 AM
 */

namespace App\Controllers;

use App\Controllers\Controller;

class AuthController extends Controller {

    public function getSignin ($request, $response, $args) {
        return $this->view->render($response,'auth/signin.twig');
    }

    public function postSignin ($request, $response, $args) {
        //
    }

    public function postSignout ($request, $response, $args) {
        return $this->view->render($response,'auth/signin.twig');
    }

    public function getSignUp ($request, $response, $args) {
        //
    }

    public function postSignUp ($request, $response, $args) {
        //
    }

}