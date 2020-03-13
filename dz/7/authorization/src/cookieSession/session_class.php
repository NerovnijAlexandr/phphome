<?php

namespace Academy;

class SessionObj
{
    public $name;
    function __construct($name, $value=null)
    {
        $this->name = $name;
        if($value)
        {
            $this->addToSession($value);
        }
    }

    public function setValue($value)
    {
        $_SESSION[$this->name] = $value;
    }

    public function getValue() {
        return $_SESSION[$this->name] ?? false;
    }

    public function delValue() {
        unset($_SESSION[$this->name]);
    }

    public function checkValue() {
        return isset($_SESSION[$this->name]);
    }

}
