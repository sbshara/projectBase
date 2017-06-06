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

class NotAllowedHandler extends AbstractHandler {

    protected $v;

    public function __construct (Twig $view) {
        $this->v = $view;
    }

    public function __invoke (ServerRequestInterface $request, ResponseInterface $response) {
        $contentType = $this->determineContentType($request);

        switch ($contentType) {
            case 'application/json':
                $output = $this->renderNotAllowedJson($response);
                break;
            case 'text/html':
                $output = $this->renderNotAllowedHtml($response);
                break;
        }
        return $output->withStatus(405);
    }

    protected function renderNotAllowedHtml ($response) {
        return $this->v->render($response, 'errors/404.twig');
    }

    protected function renderNotAllowedJson ($response) {
        return $response->withJson([
            'error' =>  'You are not authorized to perform this action(s).'
        ]);
    }

}
