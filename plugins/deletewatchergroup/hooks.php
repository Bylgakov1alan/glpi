<?php
//Hooks.php

if (!defined('GLPI_ROOT')) {
    die("Извини. У тебя недостаточно прав для просмотра");
}

include_once(GLPI_ROOT . '/plugins/deletewatchergroup/inc/log.php');

function plugin_deletewatchergroup_executeActions($data) {
    plugin_deletewatchergroup_log("Функция успешно активировалась и получила нужный параметр data");

    $counterNotMatch = 0;
    $counterNeedMatch = 0;

    $output = $data['output'] ?? [];
    $action = $data['action'] ?? [];
    $input = $data['input'] ?? [];
    $params = $data['params'] ?? [];

    global $DB;

    if (!$action instanceof RuleAction) {
        plugin_deletewatchergroup_log("Ошибка: действия нет в объекте RuleAction");
        return $output;
    }

    // plugin_deletewatchergroup_log(
    //     "просмотр всех данных которые есть в переменной output: " . print_r($output, true) 
    //     . "просмотр всех данных которые есть в переменной action: " . print_r($action, true) 
    //     . "просмотр всех данных которые есть в переменной input: " . print_r($input, true) 
    //     . "просмотр всех данных которые есть в переменной params: " . print_r($params, true) 
    // );

    if ($action->fields['action_type'] === 'delete_observers' 
        && $action->fields['field'] === '_groups_id_observer'){

        plugin_deletewatchergroup_log(  "прошло условие что action_type = delete_observers и field = _groups_id_observer" );

        $value=(int)$action->fields["value"];

        $iteratorGroup = $DB->request(   [
                                    'FROM' => 'glpi_groups',
                                    'WHERE' => ['id' => $value],
                                    'LIMIT' => 1]);

        $rowGroup = $iteratorGroup->current(); 

        plugin_deletewatchergroup_log("RowGroup после current(): " . var_export($rowGroup, true));

        if (!$rowGroup) {
            plugin_deletewatchergroup_log("Группа $value не найдена — пропускаем");
            return $output;
        }
        
        if (isset($output["_groups_id_observer_deleted"])) {
            foreach ( $output["_groups_id_observer_deleted"] as $key=>$array)
            {
                plugin_deletewatchergroup_log("Элемент с ключом $key: " . print_r($array, true));

                if ((int)$array["items_id"] === (int)$action->fields["value"]){
                    plugin_deletewatchergroup_log("сравнение прошло успешно следовательно я все правильно написал xD");
                    plugin_deletewatchergroup_log($output["_groups_id_observer_deleted"][$key]["id"] 
                                                . "    " 
                                                . $action->fields['value']);

                    $counterNotMatch = $counterNotMatch + 1;

                } else {
                    plugin_deletewatchergroup_log("нифига тут не равно! ");

                    $counterNeedMatch = $counterNeedMatch + 1;

                }   
            }



            if ($counterNotMatch > 0) {

                plugin_deletewatchergroup_log("добавлять ничего не нужно!");


            } elseif ($counterNeedMatch >=1 || $counterNotMatch === 0) {

                $idGroupTicket = 0;

                // не терять! где я проверяю существует ли тикет (обновление или создание нового)
                if (isset($input['id']) && (int)$input['id'] > 0) {

                    plugin_deletewatchergroup_log   ("айдишник тикета и его тип: " . (int)$input['id'] . "тип: " . gettype((int)$input['id'])
                                                    . "айдишник группы: "  . $value . "тип: " . gettype($value));

                    $iteratorTicket = $DB->request([
                                    'FROM' => 'glpi_groups_tickets',
                                    'WHERE' =>  [
                                                'tickets_id' => (int)$input['id'],
                                                'groups_id' => (int)$value,
                                                'type' => (int)3
                                                ],
                                    'LIMIT' => 1]);

                    $rowTicket = $iteratorTicket->current(); 

                    if (!$rowTicket) {
                        plugin_deletewatchergroup_log("связь между тикетами и группами не найдена — пропускаем");
                        return $output;
                    }

                    plugin_deletewatchergroup_log(  "запрос к бд выдал такой результат: " . var_export($rowTicket, true));
                    $idGroupTicket = $rowTicket['id'];

                    $entry = [
                        'id' => $idGroupTicket,
                        'items_id' => $value,
                        'itemtype' => 'Group',
                        'text' => $rowGroup['name'],
                        'title' => $rowGroup['completename'] ?? $rowGroup['name']
                        ];

                    plugin_deletewatchergroup_log("нужно добавить пометку в массив на удаление группы" . print_r($entry, true));

                    $output["_groups_id_observer_deleted"][] = $entry;


                    plugin_deletewatchergroup_log("вот и переменная которая выходит в конце" . print_r($output, true));
                    return $output;

                } else {

                    if (isset($output["_groups_id_observer"])) {

                        unset($output["_groups_id_observer"]["_actors_" . $value]);

                        plugin_deletewatchergroup_log("новый тикет поэтому я удаляю группу наблюдателей из массива" . $output["_groups_id_observer"]["_actors_" . $value]
                                                    . "нужно будет еще проверять логику на всякий случай вдруг этой группы нет, хотя бизнес правила изначально проверяют что группа должна быть");
                    }

                }

                
            }
        }
        
    } else {
        plugin_deletewatchergroup_log("НЕ прошло условие что action_type = delete_observers 
            и field = _groups_id_observer");
    }


    plugin_deletewatchergroup_log("вот и переменная которая выходит в конце" . print_r($output, true));
    return $output;
}