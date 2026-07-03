<?php

namespace BrainGames\Cli;

function progression(): void
{
    $gameData = [
        QUESTION => 'What number is missing in the progression?',

        GAME_LOGIC => function () {
            $count = random_int(5, 10);
            $firstEl = random_int(0, 10);
            $difference = random_int(1, 5);
            $arr = [];

            for ($i = 0; $i < $count; $i++) {
                $arr[0] = $firstEl;
                $arr[$i] = $firstEl + $i * $difference;
            }

                $randomArr = $arr;
                $randomKey = array_rand($randomArr);
                $result = $randomArr[$randomKey];

                $randomArr[$randomKey] = "..";
                $progression = implode(' ', $randomArr);

                return [
                    $progression,
                    $result
                ];
        }
    ];
    startGame($gameData);
}
