<?php

namespace BrainGames\Cli;

function randomNumber(): int
{
    $randomNumber = random_int(1, 100);
    return $randomNumber;
}

function isEven(int $randomNumber): bool
{
    return ($randomNumber % 2) === 0;
}

function rightAnswer(int $randomNumber): string
{
    $rightAnswer = isEven($randomNumber) ? 'yes' : 'no';
    return $rightAnswer;
}

function evenGame(): void
{
    $gameData = [
        QUESTION => 'Answer "yes" if the number is even, otherwise answer "no".',

        GAME_LOGIC => function () {
            $number = randomNumber();

            return [
                $number,
                rightAnswer($number)
            ];
        }
    ];

    startGame($gameData);
}
