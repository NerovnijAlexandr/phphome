<?php

namespace Academy;

session_start();

require_once ('src/cookieSession/session_class.php');

$user = new SessionObj('username');
$isAuth = new SessionObj('isAuth');

if($_SERVER["REQUEST_METHOD"] == "GET")
{
    $form = '';
    $id = $_GET["id"] ?? 0;
    if ($id == 1)
    {
        $form = "src/forms/authorizationForm.php";
    } else if ($id == 2)
    {
        $form = "src/forms/registrationForm.php";
    } else if ($id == 3)
    {
        $form = "src/forms/logoutForm.php";
    }
}

//echo $id.' '.$form;

?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Авторизация и регистрация</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
<!--    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/1.2.0/tailwind.min.css" type="text/css">-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
</head>
<body>

    <div class="container">
        <div class="row pt-3">
            <div class="col-12" id="header">
                <?php
                    include_once ("src/header.php");
                ?>
            </div>
        </div>
        <div class="row">
            <div class="col-12" id="form">
                <?php
                    if($form != '') {
                        include_once ($form);
                    } else {
                        if($isAuth->getValue()) {
                            echo '<p>Контент доступен</p>';
                        } else {
                            echo '<p>Для неавторизованых доступ запрещен</p>';
                        }
                    }
                ?>
            </div>
        </div>
    </div>

</body>
</html>
