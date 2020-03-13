<?php

namespace Academy;

session_start();

require_once ('../../cookieSession/session_class.php');
require_once ('../../../../pdo/src/Database.php');
require_once "request_class.php";

$requestClass = new Request();

$user = new SessionObj('username');
$isAuth = new SessionObj('isAuth');

if( $requestClass->isPost() )
{
    $typeform = $_POST['typeform'];

    $formData = new FormData();
    $db = new Database();
    $db->table_name = 'users';

    $formEmail = $formData->getField('email');
    $password1 = $formData->getField('password1');

    $dbEmail = $db->get_one(['email' => $formEmail]);
    $dbEmail = $dbEmail ? $dbEmail['email'] : null;

    $attrsDict = [];
    switch ($typeform) {
        case 'registration':
            $attrsDict['email'] = [
                ['func' => 'required', 'args' => []],
                ['func' => 'isEmail', 'args' => []],
                ['func' => 'isValue', 'args' => [$dbEmail]],
            ];
            $attrsDict['password2'] = [
                ['func' => 'required', 'args' => []],
                ['func' => 'min', 'args' => [8]],
                ['func' => 'eqPassword', 'args' => [$password1]],
            ];
        case 'authorization':
            $attrsDict['name'] = [
                ['func' => 'required', 'args' => []],
            ];
            $attrsDict['password1'] = [
                ['func' => 'required', 'args' => []],
                ['func' => 'min', 'args' => [8]],
            ];
            break;
    }

    foreach ($attrsDict as $key => $attrs) {
        foreach ($attrs as $attr) {
            $funcName = $attr['func'];
            $requestClass->$funcName($key, ...$attr['args']);
        }
    }

    $errors = $requestClass->getErrors();
    echo json_encode($errors);

    if(!isset($errors) || count($errors) == 0) {

        if($typeform)
        {
            $user->delValue();
            $isAuth->delValue();
        }
        switch ($typeform) {
            case 'registration':
                $db->insert([
                    'full_name' => $formData->getField('name'),
                    'email' => $formData->getField('email'),
                    'password' => md5($formData->getField('password1')),
                ]);
                break;
            case 'authorization':
                $AuthUser = $db->get_one([
                    'full_name' => $formData->getField('name'),
                    'password' => md5($formData->getField('password1')),
                ]);
                if($AuthUser) {
                    $username = $AuthUser['full_name'];
                    $isAuth->setValue(true);
                    $user->setValue($username);
                }
                break;
        }
    }
}

?>
