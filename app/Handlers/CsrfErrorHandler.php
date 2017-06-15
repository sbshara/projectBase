<?php

/**
 * Created by PhpStorm.
 * User: shiblie
 * Date: 6/6/17
 * Time: 10:41 PM
 */

namespace App\Handlers;

use Slim\Handlers\AbstractHandler;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Message\ResponseInterface;
use Slim\Views\Twig;


class CsrfErrorHandler extends AbstractHandler {

    protected $v;

    public function __construct (Twig $view) {
        $this->v = $view;
    }

    public function __invoke (ServerRequestInterface $request, ResponseInterface $response) {
        $contentType = $this->determineContentType($request);

        switch ($contentType) {
            case 'application/json':
                $output = $this->renderCsrfErrorJson($response);
                break;
            case 'text/html':
                $output = $this->renderCsrfErrorHtml($response);
                break;
        }
        return $output->withStatus(401);
    }

    protected function renderCsrfErrorHtml ($response) {
        return $this->v->render($response, 'errors/csrf.twig');
    }

    protected function renderCsrfErrorJson ($response) {
        return $response->withJson([
            'error' =>  'CSRF verification failed, we could not pass that request!'
        ]);
    }

}
