<?php

    function s_getHtml($url, $data = NULL)
    {        
        $ch = curl_init();
        
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_POST, true);
        if ($data !== NULL) curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); 
        
        return curl_exec($ch);
    }

?>