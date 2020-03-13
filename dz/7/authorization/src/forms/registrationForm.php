<?php

namespace Academy;

require_once("require/script_class.php");

$script = new RequireScript(
        'registrationForm',
        'src/forms/require/server.php',
        'invalid-feedback',
        'error',
        '.?id=1'
    );

$scriptText = $script->getText();

$typeForm = 'registration';

?>

<h2 class="py-3">Регистрация</h2>
<form id="registrationForm" onsubmit="sendData(); return false;">
    <div class="form-group row">
        <label for="name" class="col-md-2 col-form-label">Имя:</label>
        <div class="col-md-10">
            <input type="text" name="name" id="name">
            <div class="invalid-feedback"></div>
        </div>
    </div>
    <div class="form-group row">
        <label for="email" class="col-md-2 col-form-label">e-mail:</label>
        <div class="col-md-10">
            <input type="text" name="email" id="email">
            <div class="invalid-feedback"></div>
        </div>
    </div>
    <div class="form-group row">
        <label for="password1"  class="col-md-2 col-form-label">Пароль:</label>
        <div class="col-md-10">
            <input type="password" name="password1" id="password1">
            <div class="invalid-feedback"></div>
        </div>
    </div>
    <div class="form-group row">
        <label for="password2"  class="col-md-2 col-form-label">Повторите пароль:</label>
        <div class="col-md-10">
            <input type="password" name="password2" id="password2">
            <div class="invalid-feedback"></div>
        </div>
    </div>
    <div class="form-group row">
        <input type="hidden" name="typeform" value="<?=$typeForm?>">
    </div>
    <div class="form-group row">
        <input type="submit" value="Отправить">
    </div>
</form>

<?php

echo $scriptText;

?>
