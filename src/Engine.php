<?php

namespace BrainGames\Cli;

use function BrainGames\Cli\getAnswer;
use function BrainGames\Cli\promptLine;

use function cli\prompt;

const GAME_STATE = 'gameState';
const GAME_LOGIC = 'gameLogic';
//const RIGHT_ANSWER = 'rightAnswer';
const QUESTION = 'question';

function greeting(): string
{
    promptLine('Welcome to the Brain Game!');
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


/*
 function startGame(string $question, array $gameData): void
{
    $name = greeting();
    promptLine($question);
    $correctAnswers = 0;
    while ($correctAnswers < 3) {
        $state = $gameData[GAME_STATE]();
        promptLine("Question: $state");
        $answer = getAnswer('Your answer: ');
        $correctAnswer = $gameData[RIGHT_ANSWER]($state);
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
*/