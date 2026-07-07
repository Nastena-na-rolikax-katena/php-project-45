<?php

namespace BrainGames\Cli;

function randomSign(): string
{
    $signs = ['+', '-', '*'];
    $randomKey = array_rand($signs);
    $randomSign = $signs[$randomKey];
    return $randomSign;
}

function calcGame(): void
{
    $gameData = [
        QUESTION => 'What is the result of the expression?',

        GAME_LOGIC => function () {
            $num1 = random_int(1, 10);
            $num2 = random_int(1, 10);
            $sign = randomSign();

            $expression = "$num1 $sign $num2";

            $result = match ($sign) {
                "+" => $num1 + $num2,
                "-" => $num1 - $num2,
                "*" => $num1 * $num2,
            };

            return [
                $expression,
                $result
            ];
        }
    ];

    startGame($gameData);
}
