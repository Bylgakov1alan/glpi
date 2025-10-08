<?php
//Hooks.php

use CommonITILActor;
use Ticket;

if (!defined('GLPI_ROOT')) {
    die("Извини. У тебя недостаточно прав для просмотра");
}

include_once(GLPI_ROOT . '/plugins/deletewatchergroup/inc/log.php');

function plugin_deletewatchergroup_executeActions($data) {
    plugin_deletewatchergroup_log("Функция успешно активировалась и получила нужный параметр data");

    $output = $data['output'] ?? [];
    $action = $data['action'] ?? [];
    $input = $data['input'] ?? [];
    $params = $data['params'] ?? [];

    if (!$action instanceof RuleAction) {
        plugin_deletewatchergroup_log("Ошибка: действия нет в объекте RuleAction");
        return $output;
    }

    plugin_deletewatchergroup_log(
        "просмотр всех данных которые есть в переменной output: " . print_r($output, true) 
        . "просмотр всех данных которые есть в переменной action: " . print_r($action, true) 
        . "просмотр всех данных которые есть в переменной input: " . print_r($input, true) 
        . "просмотр всех данных которые есть в переменной params: " . print_r($params, true) 
    );

    if ($action->fields['action_type'] === 'delete_observers' 
        && $action->fields['field'] === '_groups_id_observer'){

        plugin_deletewatchergroup_log("прошло условие что action_type = delete_observers 
            и field = _groups_id_observer" );

        $value = (int)$action->fields['value'];

        plugin_deletewatchergroup_log("переменная value = $value");

        if (!isset($input['id']) || $input['id' <= 0]) {
            return $output;
        }

        $ticket = new Ticket();

        plugin_deletewatchergroup_log("получение нового обьекта Ticket" . print_r($ticket, true));

        if (!$ticket->getFromDB($input['id'])){
            return $output;
        }


        plugin_deletewatchergroup_log("вывод лога после того как обьект тикета загрузили из БД" . print_r($ticket, true));


        // Получаем текущие группы наблюдателей из таблицы glpi_groups_tickets

        if (isset($output["_groups_id_observer_deleted"])) {
            foreach ( $output["_groups_id_observer_deleted"] as $key=>$arr)
            {
                plugin_deletewatchergroup_log("вывод массива key: $key \n" . "вывод массива arr: $arr" );
            }
        }

            // plugin_deletewatchergroup_log("Group $value not found in observer groups.");
        
    } else {
        // plugin_deletewatchergroup_log("Skip: not delete_observers or wrong field.");
    }

    plugin_deletewatchergroup_log("Возвращаемый output: " . print_r($output, true));
    return $output;
}