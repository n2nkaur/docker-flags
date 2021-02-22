<?php
declare(strict_types=1);

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\App;
use Slim\Interfaces\RouteCollectorProxyInterface as Group;


use App\Application\Actions\FlagQuizzController;
use App\Application\Actions\HomeController;
use App\Application\Actions\RoundTableController;

return function (App $app) {
    $app->options('/{routes:.*}', function (Request $request, Response $response) {
        // CORS Pre-Flight OPTIONS Request Handler
        return $response;
    });

    $app->get('/', HomeController::class . ':showIndex');

    // if no mode_rewrite module is being used, still redirect to index
    $app->get('/{routes:.*}.php', HomeController::class . ':showIndex');

    $app->group('/quizz', function (Group $group) {
        $group->get('', FlagQuizzController::class . ':showQuestion');
        $group->post('', FlagQuizzController::class . ':processAnswer');
    });

    $app->group('/round-table', function (Group $group) {
        $group->get('', RoundTableController::class . ':showIndex');
        $group->get('/countries.json', RoundTableController::class . ':getCountriesJson');
    });
};
