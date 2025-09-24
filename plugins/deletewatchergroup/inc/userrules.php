<?php
if (!defined('GLPI_ROOT')) {
    die("Sorry. You can't access this file directly");
}

/**
 * Функция для действий (вызывается GLPI через use_rules для getAllActions)
 */
function plugin_deletewatchergroup_getRuleActions($args) {
    // Пока пусто — добавим логирование в следующем шаге
    plugin_deletewatchergroup_log("Функция getRuleActions вызвана для RuleTicket ID: ");
    return [];  // Верни пустой массив, чтобы не ломать
}

/**
 * Функция для критериев (вызывается GLPI через use_rules для getAllCriteria)
 */
function plugin_deletewatchergroup_getRuleCriteria($args) {
    plugin_deletewatchergroup_log("Функция RuleCriteria вызвана для RuleTicket ID: ");
    // Пока пусто — добавим логирование в следующем шаге
    return [];  // Верни пустой массив, чтобы не ломать
}