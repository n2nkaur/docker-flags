<?php
namespace App\Application\Actions;

use Slim\Psr7\Response;
use Slim\Psr7\Request;

class RoundTableController extends AbstractController {
    public function showIndex (Request $request, Response $response): Response {
        return $this->getView()->render($response, 'round-table/index.phtml');
    }

    public function getCountriesJson (Request $request, Response $response): Response {
        $response->getBody()->write('[{"name", "Test Country"}]');
        return $response->withHeader("Content-Type", "application/json");
    }
}
