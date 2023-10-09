<?php
function loadEnv($pathToEnv)
{
    if (!file_exists($pathToEnv)) return false;

    $lines = file($pathToEnv, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);

    // if empty
    if ($lines == false) return false;

    foreach ($lines as $line) {
        list($key, $value) = explode('=', $line, 2);
        $_ENV[$key] = $value;
        $_SERVER[$key] = $value;
    }

    return true;
}
