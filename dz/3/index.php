<?php
    require ('data.php');
    /*
     * Написать функцию pluck(), которая принимает массив
     * ассоциативных массивов первым параметром, а вторым
     * найменование ключа. На выходе мы должны получить массив
     * значений данного ключа из каждого подмассива. Например
     * */
    function pluck(array $arr, string $key): array
    {
        $retArr = [];
        foreach($arr as $line) {
            $retArr[] = $line[$key] ?? '';
        }
        return $retArr;
    }
    var_dump(pluck($arrArr, 'name'));


    /*
     * Дан массив с элементами 26, 17, 136, 12, 79, 15. С помощью цикла
     * foreach найдите сумму квадратов элементов этого массива.
     * */
    $sum = 0;
    foreach($task2numbers as $number) {
        $sum += pow($number, 2);
    }
    echo '<p> Сумма равна ', $sum, ' (',
    //вариант без foreach
    array_sum(
        array_map(
            function ($number) { return pow($number, 2); },
            $task2numbers)
    ),
    ')</p>';


    /*
     * Создать массив и наполнить его через цикл следующим рядом чисел
     * 1+4+7+10+...+112
     * */
    $arr =  []; //range(1, 112, 3);
    foreach(range(1, 112, 3) as $item) {
        $arr[] = $item;
    }
    var_dump($arr);
    echo '<br>';


    /*
     * Напишите функцию get_order($string), которая отсортирует все
     * слова в заданном предложении $string в алфавитном порядке.
     * Например get_order("ноты акустика гитара"), функция должна
     * вернуть "акустика гитара ноты"
     * */
    function get_order(string $string):string {
        $arr = mb_split(' ', $string);
        sort($arr);
        return join(' ', $arr);
    }
    echo get_order("ноты акустика гитара"), '<br>';


    /*
     * Напишите функцию, которая определяет есть ли в заданном массиве
     * повторяющие элементы, функция должна вернуть true или false
     * */
    function isRepeatedItems(array $arr):bool {
        return count($arr) == count(array_unique($arr));
    }
    var_dump(isRepeatedItems($arrRepeatedItems));
    var_dump(isRepeatedItems($arrUniqItems));
    echo '<br>';


    /*
     * С помощью цикла for необходимо создать массив чисел от 5 до 1000
     * (должен получиться массив на 995 элементов). Полученный массив
     * необходимо обработать таким образом, чтоб каждый элемент
     * данного массива увеличился в 2 раза. Из второго массива вывести с
     * помощью echo 5 рандомных значений.
     * */
    $arr1 = [];
    for($i=5; $i<1000; $i++) {
        $arr1[] = $i;
    }
    $arr2 = array_map(
        function ($item) { return $item * 2; },
        $arr1
    );
//    shuffle($arr2);
    foreach(array_rand($arr2, 5) as $ind) {
        echo $arr2[$ind], '<br>';
    }
?>
