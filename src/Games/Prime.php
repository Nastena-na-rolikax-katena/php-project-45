<?php

namespace BrainGames\Cli;

function isPrime(int $num): bool
{
    $squareRoot = floor(sqrt($num));
    $dividers = range(2, $squareRoot);

    foreach ($dividers as $divider) {
        if ($num % $divider === 0) {
            return false;
        }
    }
    return true;
}

function rightAns($num): string
{
    $rightAns = isPrime($num) ? 'yes' : 'no';
    return $rightAns;
}

function prime(): void
{
    $gameData = [
        QUESTION => 'Answer "yes" if given number is prime. Otherwise answer "no".',

        GAME_LOGIC => function () {
            $num = random_int(2, 50);
            $rightAns = rightAns($num);

            return [
                $num,
                $rightAns
            ];
        }
    ];
    startGame($gameData);
}