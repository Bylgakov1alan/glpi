<?php
if (!defined('GLPI_ROOT')) {
    die("Sorry. You can't access this file directly");
}

// Регистрируем наши хуки
$PLUGIN_HOOKS['install']['vendorstatus'] = 'plugin_vendorstatus_install';
$PLUGIN_HOOKS['uninstall']['vendorstatus'] = 'plugin_vendorstatus_uninstall';
$PLUGIN_HOOKS['pre_item_update']['vendorstatus'] = [
    'Ticket' => 'plugin_vendorstatus_pre_item_update'
];
?>
