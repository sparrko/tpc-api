<?php

    // Vars
    $url = 'http://www.tpcol.ru/asu/timetablestud.php?f=1';
    
    // Include
    include 'system/s_getDom.php';

    // Get value
    $doc = s_getDom($url);
    $xpath = new DOMXpath($doc);
    $groups = array();
    $color = $xpath->query("/html/body/table//tr[1]/td[2]/table[2]//tr[1]/td[2]/table//tr/td/table//tr[2]/td/table//tr/td[2]/font");
    
    // Returns 'g' if week is green or 'r' if week is red
    switch($color->item(0)->nodeValue){
        case "ЗЕЛЕНАЯ неделя": echo "g"; break;
        case "КРАСНАЯ неделя": echo "r"; break;
    }

?>
