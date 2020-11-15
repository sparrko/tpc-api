<?php

    // Const
    const TABLE_SELECT = 3;
    const TABLE_TODAY = 5;
    const TABLE_TOMORROW = 6;

    // Include
    include 'system/s_getDom.php';
    
    // Row class
    class Row {
        public $num;
        public $name;
    }

    // Get Table Func
    function s_getTable($tableNum, $doc)
    {      
        $numCell = 0;
        $numRow = 0;
        $tableArr = array();

        $xpath = new DOMXpath($doc);
                               //html/body/table//tr[1]/td[2]/table[2]//tr[1]/td[2]/table//tr/td/table[$tableNum]//tr/td[2]/table//tr[1]/td[2]/table//tr[@class='ttext']/td[3]
        foreach ($xpath->query("/html/body/table//tr[1]/td[2]/table[2]//tr[1]/td[2]/table//tr/td/table[$tableNum]//tr/td[2]/table//tr[1]/td[2]/table//tr[@class='ttext']/td/text()") as $var) {
            if ($tableNum == TABLE_SELECT) {
                if ($numCell == 0) { 
                    $row = new Row();
                    $row->num = trim($var->nodeValue, " \t\n\r\0\x0B\xC2\xA0");
                    array_push($tableArr, $row);
                    $numCell++;
                }
                else if ($numCell == 1) {
                    $tableArr[$numRow]->name = trim($var->nodeValue, " \t\n\r\0\x0B\xC2\xA0");
                    $numCell++;
                }
                else if ($numCell == 2) {
                    $numCell = 0;
                    $numRow++;
                }
            }
            else {
                if ($numCell == 0) { 
                    $row = new Row();
                    $row->num = trim($var->nodeValue, " \t\n\r\0\x0B\xC2\xA0");
                    array_push($tableArr, $row);
                    $numCell++;
                }
                else if ($numCell == 1) {
                    $numCell++;
                }
                else if ($numCell == 2) {
                    $numCell++;
                }
                else if ($numCell == 3) {
                    $tableArr[$numRow]->name = trim($var->nodeValue, " \t\n\r\0\x0B\xC2\xA0");
                    $numCell++;
                }
                else if ($numCell == 4) {
                    $numCell++;
                }
                else if ($numCell == 5) {
                    $numCell = 0;
                    $numRow++;
                }
            }
        }

        return $tableArr; 
    }

?>