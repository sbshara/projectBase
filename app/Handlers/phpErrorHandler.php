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


class phpErrorHandler extends AbstractHandler {

    protected $v;

    public function __construct (Twig $view) {
        $this->v = $view;
    }

    public function __invoke (ServerRequestInterface $request, ResponseInterface $response) {
        $contentType = $this->determineContentType($request);

        switch ($contentType) {
            case 'application/json':
                $output = $this->renderphpErrorJson($response);
                break;
            case 'text/html':
                $output = $this->renderphpErrorHtml($response);
                break;
        }
        return $output->withStatus(500);
    }

    protected function renderphpErrorHtml ($response) {
        return $this->v->render($response, 'errors/500.twig');
    }

    protected function renderphpErrorJson ($response) {
        return $response->withJson([
            'error' =>  'Server encountered an Error: 500.'
        ]);
    }

}
