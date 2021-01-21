<?php

namespace app\engine;

class Autoload
{

    public function loadClass($className)
    {
        $fileName = str_replace(['app', '\\'], [ROOT_DIR, DS], $className);
        include "{$fileName}.php";
    }

}