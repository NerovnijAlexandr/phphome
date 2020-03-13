<?php

namespace Academy;

require_once("require/script_class.php");

$script = new RequireScript('athorizationForm','src/forms/require/server.php', 'invalid-feedback', 'error');
$scriptText = $script->getText();

$typeForm = 'authorization';

?>

<h2 class="py-3">Авторизация</h2>
<form id="athorizationForm" onsubmit="sendData(); return false;">
    <div class="form-group row">
        <label for="name" class="col-md-2 col-form-label">Имя:</label>
        <div class="col-md-10">
            <input type="text" name="name" id="name">
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
        <input type="hidden" name="typeform" value="<?=$typeForm?>">
    </div>
    <div class="form-group row">
        <input type="submit" value="Отправить">
    </div>
</form>

<?php

echo $scriptText;

?>


