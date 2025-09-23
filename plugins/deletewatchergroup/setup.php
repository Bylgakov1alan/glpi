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

/**
 * Функция для логирования в кастомный файл
 */
function plugin_deletewatchergroup_log($message) {
    $logFile = GLPI_ROOT . '/files/_log/deletewatchergroup.log'; // Путь /var/www/html/glpi/files/_log/deletewatchergroup.log (если GLPI_ROOT = /var/www/html/glpi)
    $timestamp = date('Y-m-d H:i:s');
    file_put_contents($logFile, "[$timestamp] $message\n", FILE_APPEND);
}

/**
 * Добавление кастомного действия в бизнес-правила (для RuleTicket) - только для теста хука, без реальной логики
 */
function plugin_deletewatchergroup_add_rule_actions(&$actions) {
    plugin_deletewatchergroup_log("Функция plugin_deletewatchergroup_add_rule_actions вызвана. Текущие actions: " . print_r($actions, true));

    // Здесь можно добавить действие, если нужно для теста, но по твоему запросу убрал
    // $actions['_remove_groups_id_observer'] = [...];

    plugin_deletewatchergroup_log("Функция plugin_deletewatchergroup_add_rule_actions завершена.");
}

/**
 * Хук pre_item_add для Ticket: вызывается перед добавлением тикета
 */
function plugin_deletewatchergroup_pre_item_add($item) {
    if (!($item instanceof Ticket)) {
        return;
    }

    plugin_deletewatchergroup_log("Функция plugin_deletewatchergroup_pre_item_add вызвана для Ticket ID: " . ($item->getID() ?? 'new') . 
                                  ". Входные данные (input): " . print_r($item->input, true) . 
                                  ". Текущие поля (fields): " . print_r($item->fields, true));

    // Нет обработки, только лог
}

/**
 * Хук pre_item_update для Ticket: вызывается перед обновлением тикета
 */
function plugin_deletewatchergroup_pre_item_update($item) {
    if (!($item instanceof Ticket)) {
        return;
    }

    plugin_deletewatchergroup_log("Функция plugin_deletewatchergroup_pre_item_update вызвана для Ticket ID: " . $item->getID() . 
                                  ". Входные данные (input): " . print_r($item->input, true) . 
                                  ". Текущие поля (fields): " . print_r($item->fields, true) . 
                                  ". Изменения (updates): " . print_r($item->updates ?? [], true) . 
                                  ". Старые значения (oldvalues): " . print_r($item->oldvalues ?? [], true));

    // Нет обработки, только лог
}

/**
 * Хук item_add для Ticket: вызывается после успешного добавления тикета
 */
function plugin_deletewatchergroup_item_add($item) {
    if (!($item instanceof Ticket)) {
        return;
    }

    plugin_deletewatchergroup_log("Функция plugin_deletewatchergroup_item_add вызвана для Ticket ID: " . $item->getID() . 
                                  ". Текущие поля (fields): " . print_r($item->fields, true));

    // Нет обработки, только лог
}

/**
 * Хук item_update для Ticket: вызывается после успешного обновления тикета
 */
function plugin_deletewatchergroup_item_update($item) {
    if (!($item instanceof Ticket)) {
        return;
    }

    plugin_deletewatchergroup_log("Функция plugin_deletewatchergroup_item_update вызвана для Ticket ID: " . $item->getID() . 
                                  ". Текущие поля (fields): " . print_r($item->fields, true) . 
                                  ". Изменения (updates): " . print_r($item->updates ?? [], true) . 
                                  ". Старые значения (oldvalues): " . print_r($item->oldvalues ?? [], true));

    // Нет обработки, только лог
}