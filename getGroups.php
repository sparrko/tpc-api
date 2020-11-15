<?php

    // Vars
    $url = 'http://www.tpcol.ru/asu/timetablestud.php?f=1';
    
    // Include
    include 'system/s_getDom.php';

    // Class
    class Group {
        public $name;
        public $value;
    }

    // Init
    $doc = s_getDom($url);
    $xpath = new DOMXpath($doc);
    
    // Load and build data
    $groups = array();
    foreach ($xpath->query("//select[@name='group']/option/text()") as $name) {
        $group = new Group();
        $group->name = trim($name->nodeValue, " \t\n\r\0\x0B\xC2\xA0");
        array_push($groups, $group);
    }
    $i = 0;
    foreach ($xpath->query("//select[@name='group']/option/@value") as $value) {
        $groups[$i]->value = trim($value->nodeValue, " \t\n\r\0\x0B\xC2\xA0");
        $i++;
    }

    // Output
    echo json_encode($groups);
    
?>
