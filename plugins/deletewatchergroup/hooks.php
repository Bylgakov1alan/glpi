<?php
// hooks.php

use CommonITILActor;
use Ticket;
use Dropdown;

if (!defined('GLPI_ROOT')) {
    die("Sorry. You can't access this file directly");
}

include_once(GLPI_ROOT . '/plugins/deletewatchergroup/inc/log.php');

function plugin_deletewatchergroup_executeActions($data) {
    plugin_deletewatchergroup_log("executeActions start. Full data: " . print_r($data, true));

    $output = $data['output'] ?? [];
    $action = $data['action'] ?? null;
    $input = $data['input'] ?? [];
    $params = $data['params'] ?? [];

    if (!$action instanceof RuleAction) {
        plugin_deletewatchergroup_log("Error: action not RuleAction object.");
        return $output;
    }

    plugin_deletewatchergroup_log("Action details: type=" . ($action->fields['action_type'] ?? 'unknown') . ", field=" . ($action->fields['field'] ?? 'unknown') . ", value=" . ($action->fields['value'] ?? 'unknown') . ", ticket_id=" . ($input['id'] ?? 'new (ONADD)'));

    if ($action->fields['action_type'] === 'delete_observers' && $action->fields['field'] === '_groups_id_observer') {
        $value = (int)$action->fields['value'];

        // Пропускаем ONADD
        if (!isset($input['id']) || $input['id'] <= 0) {
            plugin_deletewatchergroup_log("Skip: ONADD (no ticket ID).");
            return $output;
        }

        // Загружаем тикет
        $ticket = new Ticket();
        if (!$ticket->getFromDB($input['id'])) {
            plugin_deletewatchergroup_log("Failed to load ticket {$input['id']}.");
            return $output;
        }

        plugin_deletewatchergroup_log("Ticket loaded: ID={$input['id']}. Fetching observer groups.");

        // Получаем текущие группы наблюдателей из таблицы glpi_groups_tickets
        global $DB;
        
        $current_groups = [];
        $iterator = $DB->request([
            'SELECT' => ['groups_id'],
            'FROM'   => 'glpi_groups_tickets',
            'WHERE'  => [
                'tickets_id' => $input['id'],
                'type'       => CommonITILActor::OBSERVER
            ]
        ]);

        foreach ($iterator as $data) {
            $current_groups[] = (int)$data['groups_id'];
        }

        plugin_deletewatchergroup_log("Current observer groups from DB: " . print_r($current_groups, true));

        // Проверяем и удаляем группу
        $key = array_search($value, $current_groups, true);
        if ($key !== false) {
            // Удаляем группу из базы данных
            $DB->delete('glpi_groups_tickets', [
                'tickets_id' => $input['id'],
                'groups_id'  => $value,
                'type'       => CommonITILActor::OBSERVER
            ]);

            // Обновляем output для GLPI
            unset($current_groups[$key]);
            $current_groups = array_values($current_groups);
            $output['_groups_id_observer'] = $current_groups;

            
            $group_name = Dropdown::getDropdownName('glpi_groups', $value);
            plugin_deletewatchergroup_log("Group $value ($group_name) removed from DB. New observer groups: " . print_r($current_groups, true));
        } else {
            plugin_deletewatchergroup_log("Group $value not found in observer groups.");
        }
    } else {
        plugin_deletewatchergroup_log("Skip: not delete_observers or wrong field.");
    }

    plugin_deletewatchergroup_log("executeActions end. Returning output: " . print_r($output, true));
    return $output;
}