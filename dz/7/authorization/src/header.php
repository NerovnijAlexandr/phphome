<?php
namespace Academy;

require_once ('cookieSession/session_class.php');

$user = new SessionObj('username');
$isAuth = new SessionObj('isAuth');

?>

<div class="row">
    <div class="col-2"></div>
    <div class="col-10">
        <div class="row justify-content-end">
            <div class="col-2 text-right">
                <a href="?id=2">Регистрация</a>
            </div>
            <div class="col-2 text-right">
                <a href="?id=1">Авторизация</a>
            </div>
            <div class="col-2 text-right">
                <?php
                    if($isAuth->getValue()) {
                        echo 'Привет, '.$user->getValue();
                    }
                ?>
            </div>
            <div class="col-2 text-right">
                <a href="?id=3">Выйти</a>
            </div>
        </div>
    </div>
</div>
