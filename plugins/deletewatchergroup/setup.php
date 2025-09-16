<?php

if (!defined('GLPI_ROOT')) {
    die("Sorry. You can't access this file directly");
}

define('PLUGIN_DELETEWATCHERGROUP_VERSION', '1.0.0');
define('PLUGIN_DELETEWATCHERGROUP_MIN_GLPI', '10.0.15');
define('PLUGIN_DELETEWATCHERGROUP_MAX_GLPI', '10.0.99');

// // Информация о плагине
function plugin_version_deletewatchergroup() {
    return [
        'name'           => 'Delete watcher group',
        'version'        => PLUGIN_DELETEWATCHERGROUP_VERSION,
        'author'         => 'Alan',
        'license'        => 'MIT',
        'homepage'       => '',
        'minGlpiVersion' => PLUGIN_DELETEWATCHERGROUP_MIN_GLPI,
        'maxGlpiVersion' => PLUGIN_DELETEWATCHERGROUP_MAX_GLPI
    ];
}

// Проверка совместимости
function plugin_deletewatchergroup_check_prerequisites() {
    if (version_compare(GLPI_VERSION, PLUGIN_DELETEWATCHERGROUP_MIN_GLPI, '<') || 
        version_compare(GLPI_VERSION, PLUGIN_DELETEWATCHERGROUP_MAX_GLPI, '>')) {
        echo "This plugin requires GLPI >= " . PLUGIN_DELETEWATCHERGROUP_MIN_GLPI . 
             " and GLPI <= " . PLUGIN_DELETEWATCHERGROUP_MAX_GLPI;
        return false;
    }
    return true;
}

// Проверка конфигурации
function plugin_deletewatchergroup_check_config($verbose = false) {
    return true;
}

// Инициализация плагина
function plugin_init_deletewatchergroup() {
    global $PLUGIN_HOOKS;

    $PLUGIN_HOOKS['csrf_compliant']['deletewatchergroup'] = true;
    
    // Регистрация хуков установки/удаления
    $PLUGIN_HOOKS['install']['deletewatchergroup'] = 'plugin_deletewatchergroup_install';
    $PLUGIN_HOOKS['uninstall']['deletewatchergroup'] = 'plugin_deletewatchergroup_uninstall';
}

// Функция установки
function plugin_deletewatchergroup_install() {
    // Здесь будет логика установки
    return true;
}

// Функция удаления
function plugin_deletewatchergroup_uninstall() {
    // Здесь будет логика удаления
    return true;
}
?>
