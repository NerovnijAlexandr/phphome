<?php

namespace Academy;

class RequireScript
{
    public $formId = '';
    public $feedbackClass = '';
    public $errorClass = '';
    public $server = '';
    public $redirect_url = '.';

    function __construct(string $formId, string $server, string $feedbackClass, string $errorClass, string $redirect_url = null)
    {
        $this->formId = '#'.$formId;
        $this->server = $server;
        $this->feedbackClass = $feedbackClass;
        $this->errorClass = $errorClass;
        $this->redirect_url = $redirect_url ?? '.';
    }

    public function getText()
    {
        return "<style>
                    .{$this->errorClass} {
                        border-color: red;
                    }
                </style>
                <script type='text/javascript'>
                    function sendData()
                    {
                        let form = '{$this->formId}';
                        let dataForm = $(form).serialize();
                        $('*', form).removeClass('{$this->errorClass}');
                        $('.{$this->feedbackClass}').empty();
                        $.ajax({
                            url: '{$this->server}', //куда отправить данные
                            type: 'POST',
                            dataType: 'json',
                            data: dataForm, // данные для отправки
                            success: function(responce) { //метод который выполняется когда пришел ответ от сервера
                                console.log(responce);
//                                console.log(responce === [], responce !== []);
                                if(responce.length == 0) {
//                                    console.log('send');
                                    location.href = '{$this->redirect_url}'; 
                                } else {
//                                    console.log('error');
                                    for(key in responce)
                                    {
                                        $(`[name='\${key}']`, form).addClass('{$this->errorClass}');
                                        $(`[name='\${key}']`, form)
                                            .siblings('.{$this->feedbackClass}')
                                            .html(responce[key]
                                                    .join('<br>'))
                                            .show();
                                    }
                                }
                            }
                        });
                    }
                </script>";
    }
}


