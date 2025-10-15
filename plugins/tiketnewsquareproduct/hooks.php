<?php
//Hooks.php

if (!defined('GLPI_ROOT')) {
    die("Извини. У тебя недостаточно прав для просмотра");
}


function plugin_ticketnewsquareproduct_pre_show_item($item) {
    plugin_ticketnewsquareproduct_log("хук pre_show_item вызван и работает функция но че там дальше должно показаться я хз пока что");
    if ($item instanceof Ticket && $item->getID() > 0) {
        // Для существующего тикета
        echo "<div class='form-field'>";
        echo "<label for='custom_field'>Мое поле:</label>";
        echo "<input type='text' name='custom_field' value='".$item->fields['custom_field']."'>";
        echo "</div>";
    }
}
