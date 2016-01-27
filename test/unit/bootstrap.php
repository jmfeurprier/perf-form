<?php

$rootPath = realpath(__DIR__ . '/../..') . '/';

$loader = require($rootPath . 'vendor/autoload.php');
$loader->addPsr4('', __DIR__ . '/lib', false);
