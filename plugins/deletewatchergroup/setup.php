<?php

if (!defined('GLPI_ROOT')) {
    die("Sorry. You can't access this file directly");
}

define('PLUGIN_DELETEWATCHERGROUP_VERSION', '1.0.0');
define('PLUGIN_DELETEWATCHERGROUP_MIN_GLPI', '10.0.15');
define('PLUGIN_DELETEWATCHERGROUP_MAX_GLPI', '10.0.99');



// Класс для логирования
class PluginDeletewatchergroupLogger {
    const LOG_FILE = GLPI_LOG_DIR . '/deletewatchergroup.log';
    
    public static function log($message, $data = null) {
        $timestamp = date('Y-m-d H:i:s');
        $logMessage = "[$timestamp] $message";
        
        if ($data !== null) {
            $logMessage .= " " . json_encode($data, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
        }
        
        file_put_contents(self::LOG_FILE, $logMessage . PHP_EOL, FILE_APPEND);
    }
}



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

    // Регистрация хуков для логирования
    $PLUGIN_HOOKS['rule_matched']['deletewatchergroup'] = ['RuleTicket' => 'plugin_deletewatchergroup_rule_matched'];
    $PLUGIN_HOOKS['pre_item_update']['deletewatchergroup'] = ['Ticket' => 'plugin_deletewatchergroup_ticket_update'];
}

// Функция установки
function plugin_deletewatchergroup_install() {
    // Здесь будет логика установки
    PluginDeletewatchergroupLogger::log("Плагин установлен");
    return true;
}

// Функция удаления
function plugin_deletewatchergroup_uninstall() {
    // Здесь будет логика удаления
    PluginDeletewatchergroupLogger::log("Плагин удален");
    return true;
}



// Функция для обработки срабатывания правила
function plugin_deletewatchergroup_rule_matched($params) {
    // $params содержит информацию о сработавшем правиле
    PluginDeletewatchergroupLogger::log("Сработало правило", $params);
    
    // Логируем сессию
    PluginDeletewatchergroupLogger::log("Данные сессии", $_SESSION);
    
    // Логируем другие глобальные переменные
    PluginDeletewatchergroupLogger::log("GET параметры", $_GET);
    PluginDeletewatchergroupLogger::log("POST параметры", $_POST);
    PluginDeletewatchergroupLogger::log("SERVER переменные", $_SERVER);
    
    // Сохраняем информацию о необходимости удаления группы наблюдателей
    if (isset($params['ticket']) && method_exists($params['ticket'], 'getID')) {
        $ticketId = $params['ticket']->getID();
        $_SESSION['delete_watcher_group'] = $ticketId;
        PluginDeletewatchergroupLogger::log("Установлен флаг удаления группы для тикета", $ticketId);
    }
}


function plugin_deletewatchergroup_ticket_update($ticket) {
// Логируем данные тикета
    PluginDeletewatchergroupLogger::log("Обновление тикета", [
        'ticket_id' => $ticket->getID(),
        'ticket_fields' => $ticket->fields,
        'ticket_input' => $ticket->input
    ]);
    
    // Логируем сессию
    PluginDeletewatchergroupLogger::log("Данные сессии при обновлении", $_SESSION);
    
    // Проверяем, установлен ли флаг удаления группы наблюдателей
    if (isset($_SESSION['delete_watcher_group']) && $_SESSION['delete_watcher_group'] == $ticket->getID()) {
        PluginDeletewatchergroupLogger::log("Удаляем группу наблюдателей для тикета", $ticket->getID());
        
        // Удаляем группу наблюдателей
        $ticket->input['_groups_id_observer'] = null;
        
        // Также очищаем дополнительные группы наблюдателей, если они есть
        if (isset($ticket->input['_additional_groups_observers'])) {
            unset($ticket->input['_additional_groups_observers']);
        }
        
        // Удаляем флаг из сессии
        unset($_SESSION['delete_watcher_group']);
    }
}
?>