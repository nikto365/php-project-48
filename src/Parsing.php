<?php

namespace Gindiff\Parsing;

function runParsing($fileOne, $fileTwo)
{
    $fileContents1 = file_get_contents($fileOne);
    $fileContents2 = file_get_contents($fileTwo);
    var_dump(json_decode($fileContents1));
    var_dump(json_decode($fileContents2));
}