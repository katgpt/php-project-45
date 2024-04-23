<?php

namespace PhpProject45\Src\Games\Prime;

use function PhpProject45\Src\Engine\runGame;

const MAX_NUMBER = 100;
const GAME_DESCRIPTION = "Answer 'yes' if given number is prime. Otherwise answer 'no'. \n";

function isPrime(int $number)
{
    if ($number <= 1) {
        return false;
    }

    for ($i = 2; $i <= sqrt($number); $i++) {
        if ($number % $i === 0) {
            return false;
        }
    }
    return true;
}

function runPrime()
{
    $getGuess = function () {
        $guess = [];
        $number = rand(1, MAX_NUMBER);
        $guess['question'] = (string)$number;
        $correctAnswer = isPrime($number) ? 'yes' : 'no';
        $guess['correctAnswer'] = $correctAnswer;

        return $guess;
    };

    runGame(GAME_DESCRIPTION, $getGuess);
}
