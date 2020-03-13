<?php

namespace Academy;

class CookieObj
{
    public $name;
    public $expire;
    public $path;
    public $domain;

    function __construct($name, string $value=null)
    {
        $this->name = $name;
        if($value)
        {
            $this->setValue($value);
        }
    }

    public function setValue(string $value)
    {
        $this->setCookie([$value]);
    }

    /**
     * задание по позиционному массиву параметров без указания имени
     * @param array $params
     */
    public function setCookie(array $params)
    {
        setcookie($this->name, ...$params);
    }

    public function getValue() {
        return $_COOKIE[$this->name] ?? false;
    }

    public function delValue() {
        $this->setCookie(["", time() - 360]);
    }
}