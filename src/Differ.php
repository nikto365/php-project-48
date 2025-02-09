<?php

namespace Differ\Differ;

use function Differ\Parsing\runParsing;

function different($array1, $array2) :string
{
    $differentValues = '';
    //нахождение ключей в массивах
    $keys1 = array_keys($array1);
    $keys2 = array_keys($array2);

    // Ключи, которые есть только в первом файле
    $onlyInFirst = array_diff($keys1, $keys2);

    // Ключи, которые есть только во втором файле
    $onlyInSecond = array_diff($keys2, $keys1);

    // Получаем ключи, которые есть в обоих массивах
    $commonKeys = array_intersect(array_keys($array1), array_keys($array2));

    //Получаем все ключи
    $allKeys = array_merge($onlyInFirst, $onlyInSecond, $commonKeys);
    sort($allKeys);

    // Формируем строки с разницей
    foreach ($allKeys as $value) {
        if (in_array($value, $onlyInFirst)) {
            $differentValues = $differentValues . "- " . $value . ": " . $array1[$value] . PHP_EOL;
        }
        if (in_array($value, $onlyInSecond)){
            $differentValues = $differentValues . "+ " . $value . ": " . $array2[$value] . PHP_EOL;
        }
        if (in_array($value, $commonKeys)) {
            if($array1[$value] === $array2[$value]) {
                $differentValues = $differentValues . "  " . $value . ": " . $array1[$value] . PHP_EOL;
            } else {
                $differentValues = $differentValues . "- " . $value . ": " . $array1[$value] . PHP_EOL;
                $differentValues = $differentValues . "+ " . $value . ": " . $array2[$value] . PHP_EOL;
            }
        }
    }

    return($differentValues);

}
function genDiff($pathToFile1, $pathToFile2) :string
{
    ($arrayFile1 = runParsing($pathToFile1));
    ($arrayFile2 = runParsing($pathToFile2));

    return different($arrayFile1, $arrayFile2);
}