<?php

namespace PhpProject45\Src\Games\Gcd;

use function PhpProject45\Src\Engine\runGame;

const MAX_NUMBER = 100;
const GAME_DESCRIPTION = "Find the greatest common divisor of given numbers.\n";

function gcd(int $a, int $b)
{
    return ((bool)($a % $b)) ? gcd($b, $a % $b) : abs($b);
}

function runGcd()
{
    $getGuess = function () {
        $guess = [];

        $number1 = rand(1, MAX_NUMBER);
        $number2 = rand(1, MAX_NUMBER);

        $guess['question'] = "{$number1} {$number2}";
        $correctAnswer = gcd($number1, $number2);
        $guess['correctAnswer'] = (string)$correctAnswer;

        return $guess;
    };

    runGame(GAME_DESCRIPTION, $getGuess);
}
