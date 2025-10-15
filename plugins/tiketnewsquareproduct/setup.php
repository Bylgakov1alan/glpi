<?php
// setup.php 

if (!defined('GLPI_ROOT')) {
    die("Sorry. You can't access this file directly");
}

// Версия плагина
define('PLUGIN_TICKETNEWSQUAREPRODUCT_VERSION', '1.0.0');
define('PLUGIN_TICKETNEWSQUAREPRODUCT_MIN_GLPI', '10.0.0');
define('PLUGIN_TICKETNEWSQUAREPRODUCT_MAX_GLPI', '10.0.99');


// Информация о плагине
function plugin_version_ticketnewsquareproduct() {
    return [
        'name'           => 'Tiket new square product',
        'version'        => PLUGIN_TICKETNEWSQUAREPRODUCT_VERSION,
        'author'         => 'Alan',
        'license'        => 'GPLv3+',
        'homepage'       => '',
        'requirements'   => [
            'glpi' => [
                'min' => PLUGIN_TICKETNEWSQUAREPRODUCT_VERSION,
                'max' => PLUGIN_TICKETNEWSQUAREPRODUCT_VERSION,
            ]
        ]
    ];
}


// Проверка совместимости
function plugin_ticketnewsquareproduct_check_prerequisites() {
    if (version_compare(GLPI_VERSION, PLUGIN_TICKETNEWSQUAREPRODUCT_MIN_GLPI, 'lt') ||
        version_compare(GLPI_VERSION, PLUGIN_TICKETNEWSQUAREPRODUCT_MAX_GLPI, 'gt')) {
        echo "This plugin requires GLPI >= " . PLUGIN_TICKETNEWSQUAREPRODUCT_MIN_GLPI . " and GLPI <= " . PLUGIN_TICKETNEWSQUAREPRODUCT_MAX_GLPI;
        return false;
    }
    return true;
}

// Проверка конфигурации
function plugin_ticketnewsquareproduct_check_config() {
    return true;
}


 // Инициализация плагина
function plugin_init_ticketnewsquareproduct() {
    global $PLUGIN_HOOKS;

    // Подключаем файлы с функциями (inc/ директория)
    include_once(GLPI_ROOT . '/plugins/ticketnewsquareproduct/inc/log.php');  // Лог-функция
    include_once(GLPI_ROOT . '/plugins/ticketnewsquareproduct/hooks.php');

    // CSRF защита
    $PLUGIN_HOOKS['csrf_compliant']['ticketnewsquareproduct'] = true;

    // Регистрация хуков установки/удаления
    $PLUGIN_HOOKS['install']['ticketnewsquareproduct'] = 'plugin_ticketnewsquareproduct_install';
    $PLUGIN_HOOKS['uninstall']['ticketnewsquareproduct'] = 'plugin_ticketnewsquareproduct_uninstall';

// Хук который вызывается при создании нового элемента. Разрешает изменение/добавление полей
    $PLUGIN_HOOKS['pre_show_item']['ticketnewsquareproduct'] = ['Ticket' => 'plugin_ticketnewsquareproduct_pre_show_item'];

}

// функция установки плагина
function plugin_ticketnewsquareproduct_install() {
    return true;
}

// Функция удаления плагина
function plugin_ticketnewsquareproduct_uninstall() {
    return true;
}

