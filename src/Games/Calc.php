<?php

namespace PhpProject45\Src\Games\Calc;

use function PhpProject45\Src\Engine\runGame;

const MAX_NUMBER = 100;
const OPERATIONS = ['+', '-', '*'];
const GAME_DESCRIPTION = 'What is the result of the expression?';

function calculate($number1, $number2, $operation)
{
    switch ($operation) {
        case '+':
            return $number1 + $number2;
        case '-':
            return $number1 - $number2;
        case '*':
            return $number1 * $number2;
    }
}

function runCalculate()
{
    $getGuess = function () {
        $guess = [];

        $number1 = rand(1, MAX_NUMBER);
        $number2 = rand(1, MAX_NUMBER);
        $operation = OPERATIONS[array_rand(OPERATIONS)];
        $statement = "$number1 $operation $number2";
        $guess['question'] = $statement;

        $correctAnswer = calculate($number1, $number2, $operation);
        $guess['correctAnswer'] = (string)$correctAnswer;

        return $guess;
    };
    
    runGame(GAME_DESCRIPTION, $getGuess);
}