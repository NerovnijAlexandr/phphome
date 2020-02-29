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
    echo '<p style="color: blue;">', abbr('Донбасская государственная машиностроительная академия'), '</p>';

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
    echo '<p style="color: blue;">', truncate_string('abcdefghijklmn', 8), '</p>';

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
    echo '<p style="color: blue;">', getCountSymbol('телефон', 'е'), '</p>';

    /*
     * Необходимо написать функцию, которая будет обрабатывать строку
     * из формы, а именно функция должна выполнять следующее:
     * -удалить концевые пробелы;
     * -удалить все html теги
     * -спец символы преобразовать в html сущности
     * Функция должна вернуть обработанную строку.
     * */
    function prettyString(string $str):string
    {
        return htmlspecialchars(strip_tags(trim($str)));
    }

    /*
     * Необходимо написать функцию, которая сокращает полное ФИО в
     * краткое, например getShortFio ("Иванов Иван Ивановчи")//результат
     * Иванов И.И.
     * */
    function getShortFio(string $fullFio):string
    {
        $shortFio = '';
        foreach(explode(' ', $fullFio) as $key => $item) {
            $shortFio .= ($key == 0) ? $item.' ' : mb_substr($item, 0, 1).'.';
        }
        return $shortFio;
    }
    echo '<p style="color: blue;">', getShortFio("Иванов Иван Ивановчи"), '</p>';

    /*
     * Необходимо в заданном имени файла выделить расширение файла
     * (без точки)
     * */
    function getExp(string $filepath):string
    {
        return mb_substr($filepath, strrpos($filepath, '.') + 1);
    }
    echo '<p style="color: blue;">', getExp("C:/Windows/System32/drivers/etc/lmhosts.sam"), '</p>';
?>

<form action="" method="post">
    <label for="str">Входная строка:</label>
    <input type="text" name="str" id="str" placeholder="Введите строку">
    <input type="submit" value="Отправить">
</form>

<?php
    if($_SERVER['REQUEST_METHOD'] == 'POST') {
        echo '<p style="color: blue;">', prettyString($_POST['str']), '</p>';
    }
?>
