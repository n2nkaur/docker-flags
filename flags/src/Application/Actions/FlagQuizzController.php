<?php
namespace App\Application\Actions;

use Slim\Psr7\Response;
use Slim\Psr7\Request;

class FlagQuizzController extends AbstractController {
    const ANSWER_COUNT = 10;

    public function showQuestion (Request $request, Response $response) {
        $countryRepo = $this->getCountryRepository();
        $country = $countryRepo->getRandomCountry();

        $answers = [$country];
        for ($i = 0; $i < self::ANSWER_COUNT - 1; $i++) {
            $answers[] = $countryRepo->getRandomCountry();
        }

        $data = [
            'country' => $country,
            'answers' => $this->sortAnswersArray($answers)
        ];
        return $this->getView()->render($response, 'quizz/question.phtml', $data);
    }

    public function processAnswer (Request $request, Response $response) {
        $countryRepo = $this->getCountryRepository();
        $body = $request->getParsedBody();

        $data = [
            'givenAnswer' => $countryRepo->findByAlpha2($body['answer']),
            'correctAnswer' => $countryRepo->findByAlpha2($body['country']),
            'isCorrect' => $body['answer'] === $body['country'],
        ];

        return $this->getView()->render($response, 'quizz/answer.phtml', $data);
    }
    
    public function sortAnswersArray($answers){
        
        foreach($answers as $ans){
            
            $sortingArray[] = [
                'name' => $ans->name,
                'alpha2' => $ans->alpha2
            ];
        }
        
        $names= [];

        //Iterating over array
        foreach ($sortingArray as $key =>$val){
            $names[$key] = $val['name'];
        }
        // Sorting array in alphabetical order as per name key
        array_multisort($names, SORT_ASC, $sortingArray);
        return $sortingArray;

    }
}
