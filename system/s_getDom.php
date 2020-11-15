<?php

    include 'system/s_getHtml.php';

    function s_getDom($url, $data = NULL)
    {      
        $html = s_getHtml($url, $data);  
        libxml_use_internal_errors(true);
        $doc = new DOMDocument();
        $doc->loadHTML($html);

        return $doc;
    }

?>