<?php

    function s_getDayOfWeek()
    {      
        date_default_timezone_set('Europe/Samara');
        $time = new DateTime(date('d.m.Y H:i:s'));
        $day = $time->format('w');
        return $day; 
    }

?>