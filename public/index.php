<?php

require_once "../vendor/autoload.php";

use app\engine\App;

$config = include "../config/config.php";

try {

    App::call()->run($config);

} catch (\Exception $e) {

    var_dump($e);

}