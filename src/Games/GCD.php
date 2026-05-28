<?php

namespace BrainGames\Cli;

/*function gcdGame()
{
    print_r("Hello");
}
*/

function gcdGame(): void
{
    $gameData = [
        QUESTION => "Find the greatest common divisor of given numbers.",

        GAME_LOGIC => function () {
            $num1 = random_int(1, 100);
            $num2 = random_int(1, 100);

            $expression = "$num1 $num2";

            while ($num2 != 0) {
                $temp = $num2;
                $num2 = $num1 % $num2;
                $num1 = $temp;
            }
            $result = abs($num1);

            return [
                $expression,
                $result
            ];
        }
    ];
    startGame($gameData);
}
