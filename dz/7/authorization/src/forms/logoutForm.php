<form id="logoutForm" onsubmit="sendData(); return false;">
    <div class="form-group row">
        <input type="hidden" name="typeform" value="logout">
    </div>
</form>

<script type='text/javascript'>
        let form = '#logoutForm';
        let dataForm = $(form).serialize();
        $.ajax({
            url: 'src/forms/require/server.php', //куда отправить данные
            type: 'POST',
            dataType: 'json',
            data: dataForm, // данные для отправки
            success: function(responce) {
                console.log(responce);
                location.href = '.';
            }
        });
</script>