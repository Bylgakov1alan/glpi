<?php
// hooks.php

use CommonITILActor;
use Group_Ticket;
use Ticket;
use Ticket_User;

if (!defined('GLPI_ROOT')) {
    die("Sorry. You can't access this file directly");
}

// Включите ваш log.php, если нужно
include_once(GLPI_ROOT . '/plugins/deletewatchergroup/inc/log.php');

function plugin_deletewatchergroup_executeActions($data) {
    plugin_deletewatchergroup_log("executeActions start. Full data: " . print_r($data, true));

    // Извлечение входных данных
    $output = $data['output'] ?? [];
    $action = $data['action'] ?? null;
    $input = $data['input'] ?? [];
    $params = $data['params'] ?? [];

    // Проверка, что action — объект RuleAction
    if (!$action instanceof RuleAction) {
        plugin_deletewatchergroup_log("Error: action not RuleAction object.");
        return $output;
    }

    plugin_deletewatchergroup_log("Action details: type=" . ($action->fields['action_type'] ?? 'unknown') . ", field=" . ($action->fields['field'] ?? 'unknown') . ", value=" . ($action->fields['value'] ?? 'unknown') . ", ticket_id=" . ($input['id'] ?? 'new (ONADD)'));

    // Проверка действия delete_observers
    if ($action->fields['action_type'] === 'delete_observers' && $action->fields['field'] === '_groups_id_observer') {
        $value = (int)$action->fields['value']; // ID группы для удаления (например, 3)

        // Пропускаем ONADD
        if (!isset($input['id']) || $input['id'] <= 0) {
            plugin_deletewatchergroup_log("Skip: ONADD (no ticket ID).");
            return $output;
        }

        // Загружаем тикет для проверки существования
        $ticket = new Ticket();
        if (!$ticket->getFromDB($input['id'])) {
            plugin_deletewatchergroup_log("Failed to load ticket {$input['id']}.");
            return $output;
        }

        plugin_deletewatchergroup_log("Ticket loaded: ID={$input['id']}. Fetching actors.");

        // Получаем всех актеров тикета
        try {
            $ticket_user = new \Ticket_User();
            $all_actors = $ticket_user->getActors($input['id']);
            // $all_actors = Ticket_User::getActors($input['id']);
            plugin_deletewatchergroup_log("All actors: " . print_r($all_actors, true));
        } catch (Exception $e) {
            plugin_deletewatchergroup_log("Error fetching actors: " . $e->getMessage());
            return $output;
        }

        // Извлекаем текущие группы наблюдателей
        $current_groups = [];
        if (isset($all_actors[CommonITILActor::OBSERVER])) {
            foreach ($all_actors[CommonITILActor::OBSERVER] as $actor) {
                if ($actor['itemtype'] === 'Group') {
                    $current_groups[] = (int)$actor['items_id'];
                }
            }
        }
        plugin_deletewatchergroup_log("Current observer groups: " . print_r($current_groups, true));

        // Проверяем, есть ли группа для удаления
        $key = array_search($value, $current_groups, true);
        if ($key !== false) {
            // Удаляем группу
            unset($current_groups[$key]);
            $current_groups = array_values($current_groups); // Реиндексация массива

            // Обновляем output для GLPI
            $output['_groups_id_observer'] = $current_groups;

            // Логируем удалённую группу
            $group_name = Dropdown::getDropdownName('glpi_groups', $value);
            plugin_deletewatchergroup_log("Group $value ($group_name) removed. New observer groups: " . print_r($current_groups, true));
        } else {
            plugin_deletewatchergroup_log("Group $value not found in observers.");
        }
    } else {
        plugin_deletewatchergroup_log("Skip: not delete_observers or wrong field.");
    }

    plugin_deletewatchergroup_log("executeActions end. Returning output: " . print_r($output, true));
    return $output;
}