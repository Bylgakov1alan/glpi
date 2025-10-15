<?php
// log.php

if (!defined('GLPI_ROOT')) {
    die("Sorry. You can't access this file directly");
}
/**
 * Функция для логирования в кастомный файл
 */
function plugin_ticketnewsquareproduct_log($message) {
    $logFile = GLPI_ROOT . '/files/_log/ticketnewsquareproduct.log'; 
    $timestamp = date('Y-m-d H:i:s');
    file_put_contents($logFile, "[$timestamp] $message\n", FILE_APPEND);
}