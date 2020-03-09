<script type="text/javascript">

    function sendData()
    {
        let form = '#bookStoreForm';
        let dataForm = $(form).serialize();
        $.ajax({
            url: 'server.php', //куда отправить данные
            type: 'POST',
            dataType: 'json',
            data: dataForm, // данные для отправки
            success: (res) => {
                if(res !== 'error') {
                    location.href = '.';
                }
            }
        })
    }
</script>