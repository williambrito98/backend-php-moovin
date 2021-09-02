<?php

namespace Moovin\Job\Backend;

use Moovin\Job\Backend\Contracts\Conta;

class FactoryConta
{

    public static function build($conta, string $responsavel): Conta
    {
        $conta = "Moovin\\Job\\Backend\\" . $conta;
        return new $conta($responsavel);
    }
}
