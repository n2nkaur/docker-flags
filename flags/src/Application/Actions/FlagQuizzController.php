<?php
namespace App\Application\Actions;

use Slim\Psr7\Response;
use Slim\Psr7\Request;

class FlagQuizzController extends AbstractController {
    const ANSWER_COUNT = 10;

    public function showQuestion (Request $request, Response $response): Response {
        $countryRepo = $this->getCountryRepository();
        $country = $countryRepo->getRandomCountry();

        $answers = [$country];
        for ($i = 0; $i < self::ANSWER_COUNT - 1; $i++) {
            $answers[] = $countryRepo->getRandomCountry();
        }
        shuffle($answers);

        $data = [
            'country' => $country,
            'answers' => $answers,
        ];
        return $this->getView()->render($response, 'quizz/question.phtml', $data);
    }

    public function processAnswer (Request $request, Response $response): Response {
        $countryRepo = $this->getCountryRepository();
        $body = $request->getParsedBody();

        $data = [
            'givenAnswer' => $countryRepo->findByAlpha2($body['answer']),
            'correctAnswer' => $countryRepo->findByAlpha2($body['country']),
            'isCorrect' => $body['answer'] === $body['country'],
        ];

        return $this->getView()->render($response, 'quizz/answer.phtml', $data);
    }
}
