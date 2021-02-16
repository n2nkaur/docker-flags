<?php
namespace App\Application\Actions;

use Slim\Psr7\Response;
use Slim\Psr7\Request;

class HomeController extends AbstractController {
    public function showIndex (Request $request, Response $response): Response {
        return $this->getView()->render($response, 'home/index.phtml');
    }
}
