<?php
if (!defined('GLPI_ROOT')) {
    die("Sorry. You can't access this file directly");
}

/**
 * Функция для действий (вызывается GLPI через use_rules для getAllActions)
 */
function plugin_deletewatchergroup_getRuleActions($args) {

    // Пока пусто — добавим логирование в следующем шаге
    plugin_deletewatchergroup_log("Функция getRuleActions вызвана");
    if ($args['rule_itemtype'] !== 'RuleTicket') return [];
    $base_actions = $args['values'];
    //plugin_deletewatchergroup_log("getRuleActions: базовые values: " . print_r($base_actions, true));

    // Добавляем 'delete_observers' в force_actions (типы действий для поля)
    if (isset($base_actions['_groups_id_observer'])) {
        if (!in_array('delete_observers', $base_actions['_groups_id_observer']['force_actions'])) {
            $base_actions['_groups_id_observer']['force_actions'][] = 'delete_observers';
        }

        // Разрешаем несколько для 'delete_observers' и 'assign' (multiple = true в UI)
        if (!in_array('delete_observers', $base_actions['_groups_id_observer']['permitseveral'])) {
            $base_actions['_groups_id_observer']['permitseveral'][] = 'delete_observers';
        }
        if (!in_array('assign', $base_actions['_groups_id_observer']['permitseveral'])) {
            $base_actions['_groups_id_observer']['permitseveral'][] = 'assign';
        }
    }

    //plugin_deletewatchergroup_log("getRuleActions: после добавления: " . print_r($base_actions, true));

    return $base_actions;
}

/**roups_id_observers
 * Функция для критериев (вызывается GLPI через use_rules для getAllCriteria)
 */
function plugin_deletewatchergroup_getRuleCriteria($args) {
    plugin_deletewatchergroup_log("Функция RuleCriteria вызвана");
    // Пока пусто — добавим логирование в следующем шаге
    return [];  // Верни пустой массив, чтобы не ломать
}