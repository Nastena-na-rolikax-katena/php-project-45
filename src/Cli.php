<?php

namespace BrainGames\Cli;

use function cli\line;
use function cli\prompt;

function promptLine(string $line): void
{
    line($line);
}

function getAnswer(string $question): string
{
    return prompt($question);
}
