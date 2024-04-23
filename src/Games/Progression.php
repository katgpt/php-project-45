<?php

namespace PhpProject45\Src\Games\Progression;

use function PhpProject45\Src\Engine\runGame;

const MAX_START_PROGRESSION = 100;
const MAX_DELTA_PROGRESSION = 10;
const PROGRESSION_LENGTH = 10;
const GAME_DESCRIPTION = "What number is missing in the progression?\n";

function getProgression(int $start, int $delta)
{
    $result = [];

    for ($i = 0; $i < PROGRESSION_LENGTH; $i++) {
        $result[] = $start + $i * $delta;
    }

    return $result;
}

function getQuestion(array $progression, int $hidedIndex)
{
    $result = '';
    for ($i = 0; $i < count($progression); $i++) {
        if ($i !== $hidedIndex) {
            $result .= $progression[$i] . ' ';
        } else {
            $result .= '.. ';
        }
    }

    return $result;
}

function runProgression()
{
    $getGuess = function () {
        $guess = [];

        $startElement = rand(1, MAX_START_PROGRESSION);
        $deltaProgression = rand(1, MAX_DELTA_PROGRESSION);
        $progression = getProgression($startElement, $deltaProgression);
        $hidedIndex = rand(0, count($progression) - 1);

        $guess['question'] = getQuestion($progression, $hidedIndex);
        $guess['correctAnswer'] = (string)$progression[$hidedIndex];
        return $guess;
    };
    runGame(GAME_DESCRIPTION, $getGuess);
}
