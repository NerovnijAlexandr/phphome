<?php

require_once "request_class.php";

$requestClass = new Request();

if( $requestClass->isPost() )
{
    $attrsDict = [
        'title' => [
            ['func' => 'required', 'args' => []],
            ['func' => 'max', 'args' => [10]],
            ['func' => 'min', 'args' => [3]],
        ],
        'annotation' => [
            ['func' => 'required', 'args' => []],
            ['func' => 'max', 'args' => [12]],
            ['func' => 'min', 'args' => [5]],
        ],
        'email' => [
            ['func' => 'required', 'args' => []],
            ['func' => 'isEmail', 'args' => []],
        ],
        'views' => [
            ['func' => 'required', 'args' => []],
            ['func' => 'isNumeric', 'args' => []],
            ['func' => 'minValue', 'args' => [10]],
            ['func' => 'maxValue', 'args' => [100]],
        ]
    ];

    foreach ($attrsDict as $key => $attrs) {
        foreach ($attrs as $attr) {
            $funcName = $attr['func'];
            $requestClass->$funcName($key, ...$attr['args']);
        }
    }

    /*
    $requestClass->required('title');
    $requestClass->max('title', 10);
    $requestClass->min('title', 3);

    $requestClass->required('annotation');
    $requestClass->max('annotation', 12);
    $requestClass->min('annotation', 5);

    $requestClass->required('email');
    $requestClass->isEmail('email');

    $requestClass->required('views');
    $requestClass->isNumeric('views');
    $requestClass->minValue('views', 10);
    $requestClass->maxValue('views', 100);
    */

    echo json_encode($requestClass->getErrors());
}

?>
