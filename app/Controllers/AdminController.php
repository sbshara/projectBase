<?php
/**
 * Created by PhpStorm.
 * User: shiblie
 * Date: 5/31/17
 * Time: 11:30 AM
 */

/**
 * MAJOR TODO: PRIORITY HIGH: pagination & per page
 */

namespace App\Controllers;

use App\Models\User;
use App\Models\Company;

use Respect\Validation\Validator as v;

class AdminController extends Controller {
    /**
     * @param $request
     * @param $response
     * @param $args
     * @return mixed
     */

    /**
     * USERS - START
     */
    public function getAllUsers ($request, $response, $args) {
        return $this->view->render($response, 'admin/user/all.twig');
    }

    public function getUserById ($request, $response, $args) {
        $User = User::find($args['user_id'])->first();
        return $this->view->render($response, 'admin/user/all.twig', compact('User'));
    }
    public function postUserById ($request, $response, $args) {
        /**
         * TODO:
         * Validate (SUPER ADMIN or PORTAL ADMIN)
         * Submit Updates
         * Flash
         * Email
         * Redirect
         */
    }

    public function getNewUser ($request, $response, $args) {
        return $this->view->render($response, 'admin/user/new.twig');
    }
    public function postNewUser ($request, $response, $args) {
        /**
         * TODO:
         * Validate (SUPER ADMIN or PORTAL ADMIN)
         * Submit details
         * Flash, Email, and Redirect
         */
    }

    public function getUserPasswordReset ($request, $response, $args) {
        return $this->view->render($response, 'admin/user/passwordreset.twig');
    }
    public function postUserPasswordReset ($request, $response, $args) {
        /**
         * TODO:
         * Validate Admin (SUPER ADMIN or PORTAL ADMIN)
         * Validate new Password
         * Submit New Password
         * Send Email Notification
         * Redirect
         */
    }

    public function deleteUser ($request, $response, $args) {
        /**
         * TODO:
         * Validate Admin (SUPER ADMIN or PORTAL ADMIN)
         * delete user
         * send last email
         * redirect
         */
    }
    /**
     * USERS - END
     */

    /**
     * Countries START
     */
    public function allCountries ($request, $response, $args) {
        /**
         * TODO: Get All Countries
         */
    }

    public function getCountryById ($request, $response, $args) {
        /**
         * TODO: GET COUNTRY BY ID
         */
    }
    public function postCountryById ($request, $response, $args) {
        /**
         * TODO: POST COUNTRY BY ID
         */
    }

    public function getNewCountry ($request, $response, $args) {
        /**
         * TODO: Get New Country
         */
    }
    public function postNewCountry ($request, $response, $args) {
        /**
         * TODO: POST NEW COUNTRY
         */
    }

    public function deleteCountry ($request, $response, $args) {
        /**
         * TODO: DELETE COUNTRY
         */
    }
    /**
     * COUNTRIES - END
     */

    /**
     * States - START
     */
    public function allStates ($request, $response, $args) {
        /**
         * TODO: GET ALL STATES
         */
    }
    public function allStatesByCountry ($request, $response, $args) {
        /**
         * TODO: GET ALL STATES BY COUNTRY (ID)
         */
    }

    public function getStateById ($request, $response, $args) {
        /**
         * TODO: GET STATE BY ID
         */
    }
    public function postStateById ($request, $response, $args) {
        /**
         * TODO: POST STATE BY ID
         */
    }

    public function getNewState ($request, $response, $args) {
        /**
         * TODO: GET NEW STATE
         */
    }
    public function postNewState ($request, $response, $args) {
        /**
         * TODO: POST NEW STATE
         */
    }

    public function deleteState ($request, $response, $args) {
        /**
         * TODO: DELETE STATE
         */
    }
    /**
     * STATES - END
     */

    /**
     * Cities - START
     */
    public function allCities ($request, $response, $args) {
        /**
         * TODO: GET ALL CITIES
         */
    }
    public function allCitiesByState ($request, $response, $args) {
        /**
         * TODO: GET ALL CITIES BY STATE (ID)
         */
    }
    public function allCitiesByCountry ($request, $response, $args) {
        /**
         * TODO: GET ALL CITIES BY COUNTRY
         */
    }

    public function getCityById ($request, $response, $args) {
        /**
         * TODO: GET CITY BY ID
         */
    }
    public function postCityById ($request, $response, $args) {
        /**
         * TODO: POST CITY BY ID
         */
    }

    public function getNewCity ($request, $response, $args) {
        /**
         * TODO: GET NEW CITY
         */
    }
    public function postNewCity ($request, $response, $args) {
        /**
         * TODO: POST NEW CITY
         */
    }

    public function deleteCity ($request, $response, $args) {
        /**
         * TODO: DELETE CITY
         */
    }


}