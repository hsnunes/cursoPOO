<?php

class Preferencias
{

    private $date;
    private static $instance;

    private function __construct()
    {
        $this->data = parse_ini_file( __DIR__ . '/application.ini');
    }

    public static function getInstance()
    {
        if (empty($instance))
        {
            self::$instance = new self;
        }
        return self::$instance;
    }

    public function getData($key)
    {
        return $this->data[$key];
    }

    public function setData($key, $value)
    {
        $this->data[$key] = $value;
    }

    public function save()
    {
        $string = '';
        if ($this->data)
        {
            foreach ($this->data as $key => $value)
            {
                $string . "{$key} = \"{$value}\" \n";
            }
        }
        file_put_contents( __DIR__ .'/application.ini', $string);
    }
}