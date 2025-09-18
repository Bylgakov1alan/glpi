<?php
// hook.php

if (!defined('GLPI_ROOT')) {
    die("Sorry. You can't access this file directly");
}

/**
 * Функция установки плагина
 */
function plugin_deletewatchergroup_install() {
    // Здесь будет код создания таблиц, прав и т.д.
    // Но сейчас ничего не делаем
    return true;
}

/**
 * Функция удаления плагина
 */
function plugin_deletewatchergroup_uninstall() {
    // Здесь будет код удаления таблиц, прав и т.д.
    // Но сейчас ничего не делаем
    return true;
}