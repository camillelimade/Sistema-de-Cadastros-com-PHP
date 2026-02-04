<?php

$envPath = __DIR__ . '/../.env';

if (!file_exists($envPath)) {
    die('Arquivo .env não encontrado.');
}

$env = parse_ini_file($envPath);

foreach ($env as $key => $value) {
    $_ENV[$key] = $value;
}
