<?php

require_once __DIR__ . '/vendor/autoload.php';

use Moovin\Job\Backend\FactoryConta;

$c1 = FactoryConta::build('ContaCorrente', 'william');
$c2 = FactoryConta::build('ContaPoupanca', 'daniel');
echo $c1;
echo "\n";
echo $c2;
