<?php

namespace Differ\Parsing;

function runParsing($file)
{
    $fileContents = file_get_contents($file);
    return (json_decode($fileContents, true));
}
