<?php
    /*
     * Написать функцию, которая будет формировать аббревиатуру
     * заданного выражения. Например Донбасская государственная
     * машиностроительная академия – ДГМА
     * */
    function abbr(string $strFull):string
    {
        $strFull = trim(mb_strtoupper($strFull));
        $strRet = mb_substr($strFull, 0, 1);
        for($i=1; $i<strlen($strFull); $i++) {
            if(mb_substr($strFull, $i-1, 1) == ' ') {
                $strRet .= mb_substr($strFull, $i, 1);
            }
        }
        return $strRet;
    }
    echo abbr('Донбасская государственная машиностроительная академия'), '<br>';

    /*
     * Напишите функцию truncate_string($str, $maxsymbol), которая
     * проверяет длину строки $str, и если она превосходит $maxsymbol –
     * заменяет конец $str на &quot;...&quot;, так чтобы ее длина стала равна
     * $maxsymbol
     * */
    function truncate_string(string $str, int $maxsymbol):string
    {
        $str = trim($str);
        $strAdd = "&quot;...&quot;";
        if($maxsymbol > 5) $maxsymbol -= 5;
        if(strlen($str) > $maxsymbol) {
            $str = substr($str, 0, $maxsymbol) . "&quot;...&quot;";
        }
        return $str;
    }
    echo truncate_string('abcdefghijklmn', 6), '<br>';

    /*
     * Необходимо написать функцию, которая считает в заданной строке
     * количество заданного символа. Например,
     * getCountSymbol('телефон', 'е');//результат выполнения – 2
     * */
    function getCountSymbol(string $str, string $letter):string
    {
        $countLetter = 0;
        for($i=0; $i<strlen($str); $i++) {
            if(mb_substr($str, $i, 1) == $letter) $countLetter++;
        }
        return $countLetter;
    }
    echo getCountSymbol('телефон', 'е'), '<br>';
?>
