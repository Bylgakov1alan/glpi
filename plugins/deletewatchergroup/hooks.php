<?php
// hooks.php

if (!defined('GLPI_ROOT')) {
    die("Sorry. You can't access this file directly");
}

// Включите ваш log.php, если нужно
include_once(GLPI_ROOT . '/plugins/deletewatchergroup/inc/log.php');

function plugin_deletewatchergroup_executeActions($data) {
    // GLPI передаёт $params = $output (изменения) или массив — проверь тип
    // if (is_array($params)) {
    //     $output = $params[0] ?? [];  // Первый — $output
    //     $data = $params[1] ?? [];    // Второй — $data
    // } else {
    //     $output = $params;  // Если не массив — это $output, $data пустой
    //     $data = [];
    // }
    $output = $data['output'] ?? [];
    $action = $data['action'] ?? null;
    $input = $data['input'] ?? [];

    plugin_deletewatchergroup_log("executeActions вызвана! Action_type: " . ($action->fields['action_type'] ?? 'unknown') . 
                                  ". Field: " . ($action->fields['field'] ?? 'unknown') . 
                                  ". Value: " . ($action->fields['value'] ?? 'unknown') . 
                                  ". Ticket ID: " . ($input['id'] ?? 'new (ONADD)') .
                                  "Data: " . (print_r($data, true)));

    // Добавь логику удаления здесь (см. ниже)

    return $output;  // Верни $output
}