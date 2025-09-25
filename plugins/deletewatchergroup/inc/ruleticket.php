<?php
// setup.php (основной файл плагина, можно переименовать в deletewatchergroup.php если нужно)

if (!defined('GLPI_ROOT')) {
    die("Sorry. You can't access this file directly");
}

/**
 * Хук pre_item_add для RuleTicket: перед добавлением нового правила
 */
function plugin_deletewatchergroup_pre_item_add_ruleticket($item) {
    if (!($item instanceof RuleTicket)) {
        return;
    }
    

    /*
    plugin_deletewatchergroup_log("Функция pre_item_add_ruleticket вызвана для RuleTicket ID: " . ($item->getID() ?? 'new') . 
                                  ". Входные данные (input): " . print_r($item->input, true) . 
                                  ". Текущие поля (fields): " . print_r($item->fields, true));

    if (isset($item->input['actions'])) plugin_deletewatchergroup_log("Actions в input: " . print_r($item->input['actions'], true));
    */
}

/**
 * Хук pre_item_update для RuleTicket: перед обновлением правила
 */
function plugin_deletewatchergroup_pre_item_update_ruleticket($item) {
    if (!($item instanceof RuleTicket)) {
        return;
    }
    /*
    plugin_deletewatchergroup_log("Функция pre_item_update_ruleticket вызвана для RuleTicket ID: " . $item->getID() . 
                                  ". Входные данные (input): " . print_r($item->input, true) . 
                                  ". Текущие поля (fields): " . print_r($item->fields, true) . 
                                  ". Изменения (updates): " . print_r($item->updates ?? [], true) . 
                                  ". Старые значения (oldvalues): " . print_r($item->oldvalues ?? [], true));
    */
}

/**
 * Хук item_add для RuleTicket: после успешного добавления правила
 */
function plugin_deletewatchergroup_item_add_ruleticket($item) {
    if (!($item instanceof RuleTicket)) {
        return;
    }
    /*
    plugin_deletewatchergroup_log("Функция item_add_ruleticket вызвана для RuleTicket ID: " . $item->getID() . 
                                  ". Текущие поля (fields): " . print_r($item->fields, true));
    */
}

/**
 * Хук item_update для RuleTicket: вызывается после успешного обновления правила
 */
function plugin_deletewatchergroup_item_update_ruleticket($item) {
    if (!($item instanceof RuleTicket)) {
        return;
    }
/*
    // Дамп всех доступных действий (actions) через метод getAllActions() - полный список, включая от плагинов
    $actions_log = print_r($item->getAllActions(), true);
    plugin_deletewatchergroup_log("Функция item_update_ruleticket: Полные actions (из getAllActions()): " . $actions_log);

    // Дамп критериев (criterias) через метод getAllCriteria()
    $criterias_log = print_r($item->getAllCriteria(), true);
    plugin_deletewatchergroup_log("Функция item_update_ruleticket: Полные criterias (из getAllCriteria()): " . $criterias_log);

    // Основной лог с ID (getID() вместо $item), fields, updates, oldvalues
    plugin_deletewatchergroup_log("Функция item_update_ruleticket вызвана для RuleTicket ID: " . $item->getID() . 
                                  ". Текущие поля (fields): " . print_r($item->fields, true) . 
                                  ". Изменения (updates): " . print_r($item->updates ?? [], true) . 
                                  ". Старые значения (oldvalues): " . print_r($item->oldvalues ?? [], true));

    */

}