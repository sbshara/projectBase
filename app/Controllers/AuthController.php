<?php
/**
 * Created by PhpStorm.
 * User: shiblie
 * Date: 5/31/17
 * Time: 11:30 AM
 */

namespace App\Controllers;

use App\Models\User;

use Respect\Validation\Validator as v;

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
        return $this->view->render($response, 'auth/signup.twig');
    }

    public function postSignUp ($request, $response, $args) {
        $validation = $this->container->validator->validate($request, [
            'first_name'        =>  v::alpha()->notEmpty()->noWhiteSpace()->length(3,24),
            'last_name'         =>  v::alpha(),
            'email'             =>  v::email()->notEmpty()->emailAvailable(),
            'phone'             =>  v::phone()->usernameAvailable(),
            'username'          =>  v::noWhitespace()->notEmpty(),
            'password'          =>  v::notEmpty()->length(8,56),
            'confirm_password'  =>  v::notEmpty()
        ]);

        if ($validation->failed()) {
            return $response->withRedirect($this->router->pathFor('auth.SignUp'));
        }

        User::create([
            'first_name'    =>  $request->getParam('first_name'),
            'last_name'     =>  $request->getParam('last_name'),
            'username'      =>  $request->getParam('username'),
            'email'         =>  $request->getParam('email'),
            'password'      =>  password_hash($request->getParam('password'), PASSWORD_DEFAULT)
        ]);

        return $response->withRedirect($this->router->pathFor('home'));
    }

}