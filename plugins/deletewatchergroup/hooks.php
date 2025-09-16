<?php
if (!defined('GLPI_ROOT')) {
    die("Sorry. You can't access this file directly");
}

$PLUGIN_HOOKS['install']['deletewatchergroup'] = 'plugin_deletewatchergroup_install';
$PLUGIN_HOOKS['uninstall']['deletewatchergroup'] = 'plugin_deletewatchergroup_uninstall';
?>
