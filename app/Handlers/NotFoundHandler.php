<?php

/**
 * Created by PhpStorm.
 * User: shiblie
 * Date: 6/6/17
 * Time: 10:40 PM
 */

namespace App\Handlers;

use Slim\Handlers\AbstractHandler;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Message\ResponseInterface;
use Slim\Views\Twig;

class NotFoundHandler extends AbstractHandler {

    protected $v;

    public function __construct (Twig $view) {
        $this->v = $view;
    }

    public function __invoke (ServerRequestInterface $request, ResponseInterface $response) {
        $contentType = $this->determineContentType($request);

        switch ($contentType) {
            case 'application/json':
                $output = $this->renderNotFoundJson($response);
                break;
            case 'text/html':
                $output = $this->renderNotFoundHtml($response);
                break;
        }
        return $output->withStatus(404);
    }

    protected function renderNotFoundHtml ($response) {
        return $this->v->render($response, 'errors/404.twig');
    }

    protected function renderNotFoundJson ($response) {
        return $response->withJson([
            'error' =>  'Query did not return any records.'
        ]);
    }

}
