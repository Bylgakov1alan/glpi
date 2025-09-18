<?php
// setup.php

if (!defined('GLPI_ROOT')) {
    die("Sorry. You can't access this file directly");
}

// Версия плагина
define('PLUGIN_deletewatchergroup_VERSION', '1.0.0');
define('PLUGIN_deletewatchergroup_MIN_GLPI', '10.0.0');
define('PLUGIN_deletewatchergroup_MAX_GLPI', '10.0.99');

/**
 * Информация о плагине
 */
function plugin_version_deletewatchergroup() {
    return [
        'name'           => 'Delete watcher group',
        'version'        => PLUGIN_deletewatchergroup_VERSION,
        'author'         => 'Alan',
        'license'        => 'GPLv3+', // рекомендуемый формат
        'homepage'       => '',
        'minGlpiVersion' => PLUGIN_deletewatchergroup_MIN_GLPI,
        'maxGlpiVersion' => PLUGIN_deletewatchergroup_MAX_GLPI,
    ];
}

/**
 * Проверка совместимости
 */
function plugin_deletewatchergroup_check_prerequisites() {
    if (version_compare(GLPI_VERSION, PLUGIN_deletewatchergroup_MIN_GLPI, 'lt') ||
        version_compare(GLPI_VERSION, PLUGIN_deletewatchergroup_MAX_GLPI, 'gt')) {
        echo "This plugin requires GLPI >= " . PLUGIN_deletewatchergroup_MIN_GLPI . " and GLPI <= " . PLUGIN_deletewatchergroup_MAX_GLPI;
        return false;
    }
    return true;
}

/**
 * Проверка конфигурации
 */
function plugin_deletewatchergroup_check_config() {
    return true;
}

/**
 * Инициализация плагина
 */
function plugin_init_deletewatchergroup() {
    global $PLUGIN_HOOKS;

    // CSRF защита
    $PLUGIN_HOOKS['csrf_compliant']['deletewatchergroup'] = true;

    // Регистрация хуков установки/удаления
    $PLUGIN_HOOKS['install']['deletewatchergroup'] = 'plugin_deletewatchergroup_install';
    $PLUGIN_HOOKS['uninstall']['deletewatchergroup'] = 'plugin_deletewatchergroup_uninstall';
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