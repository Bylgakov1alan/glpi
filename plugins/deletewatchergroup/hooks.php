<?php
if (!defined('GLPI_ROOT')) {
    die("Sorry. You can't access this file directly");
}

$PLUGIN_HOOKS['install']['deletewatchergroup'] = 'plugin_deletewatchergroup_install';
$PLUGIN_HOOKS['uninstall']['deletewatchergroup'] = 'plugin_deletewatchergroup_uninstall';

$PLUGIN_HOOKS['rule_matched']['deletewatchergroup'] = ['RuleTicket' => 'plugin_deletewatchergroup_rule_matched'];

$PLUGIN_HOOKS['pre_item_update']['deletewatchergroup'] = ['Ticket' => 'plugin_deletewatchergroup_ticket_update'];


?>
