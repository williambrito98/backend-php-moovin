<?php


namespace Moovin\Job\Backend\Contracts;


abstract class Conta
{

    protected $limiteSaque;
    protected $taxa;
    protected $responsavel;
    protected $saldo = 0;

    public abstract function sacar(float $value): float;
    public abstract function transferir(float $value, Conta $conta): float;
    public abstract function depositar(float $value): float;
}
