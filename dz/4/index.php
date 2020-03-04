<?php

    require_once ('data.php');

    $dd = new DateFunctionsClass();
    $strDate1 = '04-03-2020';
    $strDate2 = '01-03-2020';
    $dd->setDate1($strDate1);
    $dd->setDate2($strDate2);

    echo 'В Timestamp представлении ', $strDate1, ' ', $dd->getDateInTimestamp(), '<br>';
    echo 'В Timestamp представлении ', $strDate2, ' ', $dd->getDateInTimestamp($strDate2), '<br>';
    echo 'Разность между датами в днях ', $dd->getDifferentDate(), '<br>';
    echo 'Разность между датами в днях ', $dd->getDifferentDate($strDate1, $strDate2), '<br>';
    echo $strDate2, ' рабочий день? ';
    var_dump($dd->isWorkDate($strDate2));
    echo '<br>';
    echo $strDate1, ' рабочий день? ';
    var_dump($dd->isWorkDate());
    echo '<br>';
    echo $strDate1, '. День недели - ', $dd->getNameDayOfWeek(), '<br>';
    echo $strDate2, '. День недели - ', $dd->getNameDayOfWeek($strDate2), '<br>';
?>