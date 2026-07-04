<?php

namespace BrainGames\Cli;

function isPrime(int $num): bool
{
    if ($num < 2) {
        return false;
    }

    for ($i = 2; $i <= $num / 2; $i++) {
        if ($num % $i === 0) {
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
