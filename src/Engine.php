<?php

namespace BrainGames\Cli;

use function BrainGames\Cli\getAnswer;
use function BrainGames\Cli\promptLine;
use function cli\prompt;

const GAME_LOGIC = 'gameLogic';
const QUESTION = 'question';

function greeting(): string
{
    promptLine('Welcome to the Brain Games!');
    $name = getAnswer('May I have your name?');
    promptLine("Hello, $name!");
    return $name;
}

function startGame(array $gameData): void
{
    $name = greeting();
    promptLine($gameData[QUESTION]);
    $correctAnswers = 0;
    while ($correctAnswers < 3) {
        [$state, $correctAnswer] = $gameData[GAME_LOGIC]();
        $correctAnswer = (string) $correctAnswer;
        promptLine("Question: $state");
        $answer = getAnswer('Your answer ');
        if ($answer === $correctAnswer) {
            promptLine('Correct!');
            $correctAnswers++;
        } else {
            promptLine("'$answer' is wrong answer ;(. Correct answer was '$correctAnswer'. Let's try again, $name!");
            exit();
        }
    }
    if ($correctAnswers === 3) {
        promptLine("Congratulations, $name!");
    }
}
