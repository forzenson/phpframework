<?php

if (function_exists('date_default_timezone_set'))
date_default_timezone_set('Europe/Kiev');

// 1. Общие настройки
ini_set('display_errors',1);
error_reporting(E_ALL);

// Поключение файлов системы
require realpath(__DIR__.'/../').'/core/'.'bootstrap.php';
