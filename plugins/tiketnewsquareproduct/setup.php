<?php
// setup.php 

if (!defined('GLPI_ROOT')) {
    die("Sorry. You can't access this file directly");
}

// Версия плагина
define('PLUGIN_TICKETNEWSQUAREPRODUCT_VERSION', '1.0.0');
define('PLUGIN_TICKETNEWSQUAREPRODUCT_MIN_GLPI', '10.0.0');
define('PLUGIN_TICKETNEWSQUAREPRODUCT_MAX_GLPI', '10.0.99');

/**
 * Информация о плагине
 */
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

/**
 * Проверка совместимости
 */
function plugin_ticketnewsquareproduct_check_prerequisites() {
    if (version_compare(GLPI_VERSION, PLUGIN_TICKETNEWSQUAREPRODUCT_MIN_GLPI, 'lt') ||
        version_compare(GLPI_VERSION, PLUGIN_TICKETNEWSQUAREPRODUCT_MAX_GLPI, 'gt')) {
        echo "This plugin requires GLPI >= " . PLUGIN_TICKETNEWSQUAREPRODUCT_MIN_GLPI . " and GLPI <= " . PLUGIN_TICKETNEWSQUAREPRODUCT_MAX_GLPI;
        return false;
    }
    return true;
}

/**
 * Проверка конфигурации
 */
function plugin_ticketnewsquareproduct_check_config() {
    return true;
}

/**
 * Инициализация плагина
 */
function plugin_init_ticketnewsquareproduct() {
    global $PLUGIN_HOOKS;

    // Подключаем файлы с функциями (inc/ директория)
    include_once(GLPI_ROOT . '/plugins/TICKETNEWSQUAREPRODUCT/inc/log.php');  // Лог-функция
    include_once(GLPI_ROOT . '/plugins/TICKETNEWSQUAREPRODUCT/inc/ticket.php');  // Функции для Ticket
    include_once(GLPI_ROOT . '/plugins/TICKETNEWSQUAREPRODUCT/inc/ruleticket.php');  // Функции для RuleTicket
    include_once(GLPI_ROOT . '/plugins/TICKETNEWSQUAREPRODUCT/inc/userrules.php');  // Функции для use_rules
    include_once(GLPI_ROOT . '/plugins/TICKETNEWSQUAREPRODUCT/hooks.php');

    // CSRF защита
    $PLUGIN_HOOKS['csrf_compliant']['TICKETNEWSQUAREPRODUCT'] = true;

    // Регистрация хуков установки/удаления
    $PLUGIN_HOOKS['install']['TICKETNEWSQUAREPRODUCT'] = 'plugin_ticketnewsquareproduct_install';
    $PLUGIN_HOOKS['uninstall']['TICKETNEWSQUAREPRODUCT'] = 'plugin_ticketnewsquareproduct_uninstall';

// Хуки для обработки тикета (pre и post для add/update)
    $PLUGIN_HOOKS['pre_item_add']['TICKETNEWSQUAREPRODUCT'] = ['Ticket' => 'plugin_ticketnewsquareproduct_pre_item_add'];
    $PLUGIN_HOOKS['pre_item_update']['TICKETNEWSQUAREPRODUCT'] = ['Ticket' => 'plugin_ticketnewsquareproduct_pre_item_update'];
    $PLUGIN_HOOKS['item_add']['TICKETNEWSQUAREPRODUCT'] = ['Ticket' => 'plugin_ticketnewsquareproduct_item_add'];
    $PLUGIN_HOOKS['item_update']['TICKETNEWSQUAREPRODUCT'] = ['Ticket' => 'plugin_ticketnewsquareproduct_item_update'];

// Хуки для RuleTicket (для работы с бизнес-правилами)
    $PLUGIN_HOOKS['pre_item_add']['TICKETNEWSQUAREPRODUCT'] = ['RuleTicket' => 'plugin_ticketnewsquareproduct_pre_item_add_ruleticket'];
    $PLUGIN_HOOKS['pre_item_update']['TICKETNEWSQUAREPRODUCT'] = ['RuleTicket' => 'plugin_ticketnewsquareproduct_pre_item_update_ruleticket'];
    $PLUGIN_HOOKS['item_add']['TICKETNEWSQUAREPRODUCT'] = ['RuleTicket' => 'plugin_ticketnewsquareproduct_item_add_ruleticket'];
    $PLUGIN_HOOKS['item_update']['TICKETNEWSQUAREPRODUCT'] = ['RuleTicket' => 'plugin_ticketnewsquareproduct_item_update_ruleticket'];

// Хуки для use_rules которые будут вызывать функции plugin_ticketnewsquareproduct_getRuleActions($args) и plugin_ticketnewsquareproduct_getRuleCriteria($args)
    $PLUGIN_HOOKS['use_rules']['TICKETNEWSQUAREPRODUCT'] = ['RuleTicket'];
}

/**
 * Функция установки плагина
 */
function plugin_ticketnewsquareproduct_install() {
    // Здесь можно добавить создание таблиц, если нужно, но пока ничего
    return true;
}

/**
 * Функция удаления плагина
 */
function plugin_ticketnewsquareproduct_uninstall() {
    // Здесь можно добавить удаление таблиц, если нужно, но пока ничего
    return true;
}

