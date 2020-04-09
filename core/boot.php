<?php

use \core\container\DI;

$di = new DI();
$di->InitDependeces();
$di->Get('router')->Run();

