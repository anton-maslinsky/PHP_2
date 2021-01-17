<?php

namespace app\engine;

class Autoload
{

    public function loadClass($className)
    {
        $trans = array("app" => "..", "\\" => "/");
        $fileName = strtr($className, $trans);
        include "{$fileName}.php";
    }

}