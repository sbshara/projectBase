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

    public function getSignUp ($request, $response, $args) {
        return $this->view->render($response, 'auth/signup.twig');
    }

    public function postSignUp ($request, $response, $args) {
        $validation = $this->container->validator->validate($request, [
            'first_name'        =>  v::alpha()->notEmpty()->noWhiteSpace()->length(3,24),
            'last_name'         =>  v::alpha(),
            'email'             =>  v::email()->notEmpty()->emailAvailable(),
            'phone'             =>  v::phone()->usernameAvailable(),
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

        $this->auth->attempt($request->getParam('email'), $request->getParam('password'));
        return $response->withRedirect($this->router->pathFor('home'));
    }

    public function getSignIn ($request, $response, $args) {
        return $this->view->render($response,'auth/signin.twig');
    }

    public function postSignIn ($request, $response, $args) {
        // Validation (for UX only)
        $auth = $this->auth->attempt (
            $request->getParam('email'),
            $request->getParam('password')
        );

        if (!$auth) {
            // Flash failure here
            return $response->withRedirect($this->router->pathFor('auth.SignIn'));
        }

        return $response->withRedirect($this->router->pathFor('home'));

    }

    public function getSignOut ($request, $response, $args) {
        $this->auth->signOut();
        return $response->withRedirect($this->router->pathFor('home'));
    }


    public function getPasswordChange ($request, $response, $args) {
        return $this->view->render($response, 'auth/passwordChange.twig');
    }

    public function postPasswordChange ($request, $response, $args) {
        // check if user is still logged in
        // validation
        // password change
        // flash
        // email notification
    }

}