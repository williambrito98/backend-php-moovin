<?php


namespace Moovin\Job\Backend;

use Moovin\Job\Backend\Contracts\Conta;


class ContaPoupanca extends Conta
{

    function __construct(string $responsavel)
    {
        $this->responsavel = $responsavel;
        $this->taxa = 0.80;
        $this->limiteSaque = 1000;
    }

    public function __set($atrib, $value)
    {
        $this->$atrib = $value;
    }

    public function __get($name)
    {
        return $this->$name;
    }

    public function sacar(float $value): float
    {

        if (!is_float($value) || $value < 0) return 0;

        if ($this->saldo === 0) return 0;

        if ($this->limiteSaque === 0) return 0;


        $novoSaldo = $this->saldo - $value;

        if ($novoSaldo < 0 || $novoSaldo > $this->saldo || $this->limiteSaque < $value) return 0;


        $this->saldo = $novoSaldo - $this->taxa;


        $this->limiteSaque -= $value;


        return $value;
    }

    public function transferir(float $value, Conta $conta): float
    {
        if (!is_float($value) || $value < 0) return 0;

        if ($this->saldo < $value) return 0;

        $novoSaldo = $this->saldo - $value;

        if ($novoSaldo > $this->saldo) return 0;

        $conta->saldo += $value;

        $this->saldo = $novoSaldo;

        return $this->saldo;
    }

    public function depositar(float $value): float
    {
        if (!is_float($value) || $value < 0) return 0;

        $this->saldo += $value;

        return $value;
    }

    public function __toString()
    {
        return "Saldo: B$ {$this->saldo}\nLimite para Saque: B$ {$this->limiteSaque}\n";
    }
}
