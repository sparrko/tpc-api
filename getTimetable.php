<?php

    // Include
    include 'system/s_getTable.php';
    include 'system/s_getDayOfWeek.php';

    // Vars
    $url = 'http://www.tpcol.ru/asu/timetablestud.php?f=1';
    $group = $_GET["group"];
    $wday = s_getDayOfWeek();

    // Classes
    class Day {
        public $tt_red;
        public $tt_green;
        public $tt_changes;

        function init($day){
            global $url, $group, $wday;
            
            $data = array('group' => $group, 'day' => $day, 'week' => "0");
            $doc = s_getDom($url, $data);
            $xpath = new DOMXpath($doc);
            $this->tt_red = s_getTable(TABLE_SELECT, $doc);
            
            $data['week'] = "1";
            $doc = s_getDom($url, $data);
            $xpath = new DOMXpath($doc);
            $this->tt_green = s_getTable(TABLE_SELECT, $doc);

            if ($wday == $day) {
                $this->tt_changes = s_getTable(TABLE_TODAY, $doc);
            }
            if ($wday + 1 == $day) {
                $this->tt_changes = s_getTable(TABLE_TOMORROW, $doc);
            }
       }
    }

    // Load and build data in class
    $days = array();
    for ($i = 1; $i < 6; $i++) {
        $day = new Day();
        $day->init($i);
        array_push($days, $day);
    }   

    // Output
    echo json_encode($days);

?>
