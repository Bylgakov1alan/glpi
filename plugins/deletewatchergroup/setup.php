<?php
// setup.php (основной файл плагина, можно переименовать в deletewatchergroup.php если нужно)

if (!defined('GLPI_ROOT')) {
    die("Sorry. You can't access this file directly");
}

// Версия плагина
define('PLUGIN_DELETEWATCHERGROUP_VERSION', '1.0.0');
define('PLUGIN_DELETEWATCHERGROUP_MIN_GLPI', '10.0.0');
define('PLUGIN_DELETEWATCHERGROUP_MAX_GLPI', '10.0.99');

/**
 * Информация о плагине
 */
function plugin_version_deletewatchergroup() {
    return [
        'name'           => 'Delete Watcher Group',
        'version'        => PLUGIN_DELETEWATCHERGROUP_VERSION,
        'author'         => 'Alan',
        'license'        => 'GPLv3+',
        'homepage'       => '',
        'requirements'   => [
            'glpi' => [
                'min' => PLUGIN_DELETEWATCHERGROUP_MIN_GLPI,
                'max' => PLUGIN_DELETEWATCHERGROUP_MAX_GLPI,
            ]
        ]
    ];
}

/**
 * Проверка совместимости
 */
function plugin_deletewatchergroup_check_prerequisites() {
    if (version_compare(GLPI_VERSION, PLUGIN_DELETEWATCHERGROUP_MIN_GLPI, 'lt') ||
        version_compare(GLPI_VERSION, PLUGIN_DELETEWATCHERGROUP_MAX_GLPI, 'gt')) {
        echo "This plugin requires GLPI >= " . PLUGIN_DELETEWATCHERGROUP_MIN_GLPI . " and GLPI <= " . PLUGIN_DELETEWATCHERGROUP_MAX_GLPI;
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

    // Подключаем файлы с функциями (inc/ директория)
    include_once(GLPI_ROOT . '/plugins/deletewatchergroup/inc/log.php');  // Лог-функция
    include_once(GLPI_ROOT . '/plugins/deletewatchergroup/inc/ticket.php');  // Функции для Ticket
    include_once(GLPI_ROOT . '/plugins/deletewatchergroup/inc/ruleticket.php');  // Функции для RuleTicket
    include_once(GLPI_ROOT . '/plugins/deletewatchergroup/inc/userrules.php');  // Функции для use_rules

    // CSRF защита
    $PLUGIN_HOOKS['csrf_compliant']['deletewatchergroup'] = true;

    // Регистрация хуков установки/удаления
    $PLUGIN_HOOKS['install']['deletewatchergroup'] = 'plugin_deletewatchergroup_install';
    $PLUGIN_HOOKS['uninstall']['deletewatchergroup'] = 'plugin_deletewatchergroup_uninstall';

// Хуки для обработки тикета (pre и post для add/update)
    $PLUGIN_HOOKS['pre_item_add']['deletewatchergroup'] = ['Ticket' => 'plugin_deletewatchergroup_pre_item_add'];
    $PLUGIN_HOOKS['pre_item_update']['deletewatchergroup'] = ['Ticket' => 'plugin_deletewatchergroup_pre_item_update'];
    $PLUGIN_HOOKS['item_add']['deletewatchergroup'] = ['Ticket' => 'plugin_deletewatchergroup_item_add'];
    $PLUGIN_HOOKS['item_update']['deletewatchergroup'] = ['Ticket' => 'plugin_deletewatchergroup_item_update'];

// Хуки для RuleTicket (для работы с бизнес-правилами)
    $PLUGIN_HOOKS['pre_item_add']['deletewatchergroup'] = ['RuleTicket' => 'plugin_deletewatchergroup_pre_item_add_ruleticket'];
    $PLUGIN_HOOKS['pre_item_update']['deletewatchergroup'] = ['RuleTicket' => 'plugin_deletewatchergroup_pre_item_update_ruleticket'];
    $PLUGIN_HOOKS['item_add']['deletewatchergroup'] = ['RuleTicket' => 'plugin_deletewatchergroup_item_add_ruleticket'];
    $PLUGIN_HOOKS['item_update']['deletewatchergroup'] = ['RuleTicket' => 'plugin_deletewatchergroup_item_update_ruleticket'];

// Хуки для use_rules которые будут вызывать функции plugin_deletewatchergroup_getRuleActions($args) и plugin_deletewatchergroup_getRuleCriteria($args)
    $PLUGIN_HOOKS['use_rules']['deletewatchergroup'] = ['RuleTicket'];
}

/**
 * Функция установки плагина
 */
function plugin_deletewatchergroup_install() {
    // Здесь можно добавить создание таблиц, если нужно, но пока ничего
    return true;
}

/**
 * Функция удаления плагина
 */
function plugin_deletewatchergroup_uninstall() {
    // Здесь можно добавить удаление таблиц, если нужно, но пока ничего
    return true;
}

