<?php

namespace Src\Cli;

use function cli\line;
use function cli\prompt;

function run()
{
    line("Welcome to the Brain Games!\n");
    $name = prompt('May I have your name?');
    line("Hello, %s!", $name);
}
