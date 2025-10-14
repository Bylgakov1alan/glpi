<?php

//ticket.php

if (!defined('GLPI_ROOT')) {
    die("Sorry. You can't access this file directly");
}

/**
 * Хук pre_item_add для Ticket: вызывается перед добавлением тикета
 */
function plugin_deletewatchergroup_pre_item_add($item) {
    if (!($item instanceof Ticket)) {
        return;
    }

   /* plugin_deletewatchergroup_log("Функция plugin_deletewatchergroup_pre_item_add вызвана для Ticket ID: " . ($item->getID() ?? 'new') . 
                                  ". Входные данные (input): " . print_r($item->input, true) . 
                                  ". Текущие поля (fields): " . print_r($item->fields, true));
    */
}

/**
 * Хук pre_item_update для Ticket: вызывается перед обновлением тикета
 */
function plugin_deletewatchergroup_pre_item_update($item) {
    if (!($item instanceof Ticket)) {
        return;
    }

    /*
    plugin_deletewatchergroup_log("Функция plugin_deletewatchergroup_pre_item_update вызвана для Ticket ID: " . $item->getID() . 
                                  ". Входные данные (input): " . print_r($item->input, true) . 
                                  ". Текущие поля (fields): " . print_r($item->fields, true) . 
                                  ". Изменения (updates): " . print_r($item->updates ?? [], true) . 
                                  ". Старые значения (oldvalues): " . print_r($item->oldvalues ?? [], true));

    */
}

/**
 * Хук item_add для Ticket: вызывается после успешного добавления тикета
 */
function plugin_deletewatchergroup_item_add($item) {
    if (!($item instanceof Ticket)) {
        return;
    }
    /*
    plugin_deletewatchergroup_log("Функция plugin_deletewatchergroup_item_add вызвана для Ticket ID: " . $item->getID() . 
                                  ". Текущие поля (fields): " . print_r($item->fields, true));
    */
}

/**
 * Хук item_update для Ticket: вызывается после успешного обновления тикета
 */
function plugin_deletewatchergroup_item_update($item) {
    if (!($item instanceof Ticket)) {
        return;
    }
    /*
    plugin_deletewatchergroup_log("Функция plugin_deletewatchergroup_item_update вызвана для Ticket ID: " . $item->getID() . 
                                  ". Текущие поля (fields): " . print_r($item->fields, true) . 
                                  ". Изменения (updates): " . print_r($item->updates ?? [], true) . 
                                  ". Старые значения (oldvalues): " . print_r($item->oldvalues ?? [], true));
    */
}