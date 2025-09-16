<?php
if (!defined('GLPI_ROOT')) {
    die("Sorry. You can't access this file directly");
}

define('PLUGIN_VENDORSTATUS_VERSION', '1.0.0');
define('PLUGIN_VENDORSTATUS_MIN_GLPI', '10.0.0');
define('PLUGIN_VENDORSTATUS_MAX_GLPI', '10.0.99');

// стандартная функция информации о плагине 
function plugin_version_vendorstatus() {
    return [
        'name'           => 'Vendor Status',
        'version'        => PLUGIN_VENDORSTATUS_VERSION,
        'author'         => 'Alan',
        'license'        => 'GPLv2+',
        'homepage'       => '',
        'minGlpiVersion' => PLUGIN_VENDORSTATUS_MIN_GLPI,
        'maxGlpiVersion' => PLUGIN_VENDORSTATUS_MAX_GLPI
    ];
}

// стандартная функция совместимости  версии плагина и самой GLPI
function plugin_vendorstatus_check_prerequisites() {
    if (version_compare(GLPI_VERSION, PLUGIN_VENDORSTATUS_MIN_GLPI, '<') || version_compare(GLPI_VERSION, PLUGIN_VENDORSTATUS_MAX_GLPI, '>')) {
        echo "This plugin requires GLPI >= " . PLUGIN_VENDORSTATUS_MIN_GLPI . " and < " . PLUGIN_VENDORSTATUS_MAX_GLPI;
        return false;
    }
    return true;
}

function plugin_vendorstatus_check_config() {
    return true;
}

//   инициализация плагина вызывается автоматически glpi
function plugin_init_vendorstatus() {
    // доступ к хукам
    global $PLUGIN_HOOKS;
    

    $PLUGIN_HOOKS['csrf_compliant']['vendorstatus'] = true;
    
    // Установка и удаление
    $PLUGIN_HOOKS['install']['vendorstatus'] = 'plugin_vendorstatus_install';
    $PLUGIN_HOOKS['uninstall']['vendorstatus'] = 'plugin_vendorstatus_uninstall';
    
    // Добавляем наш статус в список статусов тикетов
    $PLUGIN_HOOKS['pre_item_update']['vendorstatus'] = [
        'Ticket' => 'plugin_vendorstatus_pre_item_update'
    ];
}



// создание самого статуса
function plugin_vendorstatus_install() {
    global $DB;
    
    // Добавляем новый статус в таблицу glpi_states
    $state = new State();
    $state_id = $state->add([
        'name'         => 'Эскалировано на вендера',
        'entities_id'  => 0,
        'is_recursive' => 1,
        'comment'      => 'Статус добавлен плагином Vendor Status',
        'states_id'    => 0
    ]);
    
    // Делаем статус видимым для тикетов
    if ($state_id) {
        $state_ticket = new State_Ticket();
        $state_ticket->update([
            'id'           => $state_id,
            'is_visible'   => 1,
            'is_recursive' => 1
        ]);
    }
    
    return true;
}

function plugin_vendorstatus_uninstall() {
    global $DB;
    
    // Удаляем наш статус при удалении плагина
    $state = new State();
    $states = $state->find(['name' => 'Эскалировано на вендера']);
    
    foreach ($states as $s) {
        $state->delete($s);
    }
    
    return true;
}

function plugin_vendorstatus_pre_item_update($item) {
    if ($item->getType() == 'Ticket') {
        // Здесь можно добавить дополнительную логику при изменении статуса
    }
}
?>
