<?php

$rootPath = realpath(__DIR__ . '/../..') . '/';

$loader = require($rootPath . 'vendor/autoload.php');
$loader->addPsr4('perf\\Form\\', __DIR__ . '/src', false);
