<?php

namespace Differ\Parsing;

use Symfony\Component\Yaml\Yaml;
use Symfony\Component\Yaml\Exception\ParseException;

function is_yaml_file($file)
{
    $extension = pathinfo($file, PATHINFO_EXTENSION);
    if ($extension !== 'yaml' && $extension !== 'yml') {
        return false;
    }
    try {
        $data = Yaml::parseFile($file);
        // Если парсинг прошел успешно, то файл является YAML
        return true;
    } catch (ParseException $e) {
        // Ошибка парсинга, значит файл не является корректным YAML
        return false;
    }
}

function is_json_file($file)
{
    // Проверка расширения файла (не обязательно, но полезно)
    $extension = pathinfo($file, PATHINFO_EXTENSION);
    if ($extension !== 'json') {
        return false;
    }

    // Чтение содержимого файла
    $content = file_get_contents($file);

    // Попытка декодировать содержимое как JSON
    json_decode($content);

    // Проверка на ошибки декодирования
    return json_last_error() === JSON_ERROR_NONE;
}


function runParsing($file)
{
    if (is_yaml_file($file)) {
        return Yaml::parseFile($file);
    }
    if (is_json_file($file)) {
        $fileContents = file_get_contents($file);
        return (json_decode($fileContents, true));
    }
}
