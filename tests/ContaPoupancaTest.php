<?php

namespace Moovin\Job\Backend;

use Moovin\Job\Backend\FactoryConta;

/**
 * Teste unit�rio da classe Moovin\Job\Backend\ContaCorrente
 */
class ContaPoupancaTest extends \PHPUnit_Framework_TestCase
{

    protected $cliente1;
    protected $cliente2;

    protected function setUp()
    {
        $this->cliente1 = FactoryConta::build('ContaPoupanca', 'cliente1');
        $this->cliente2 = FactoryConta::build('ContaPoupanca', 'cliente2');
        $this->cliente1->saldo = 1000;
    }

    /**
     * @covers Moovin\Job\Backend\Example::examplo
     */
    public function testItShouldSacar()
    {
        $this->assertEquals(300, $this->cliente1->sacar(300));
    }

    public function testItShouldTransferir()
    {
        $this->assertEquals(900, $this->cliente1->transferir(100, $this->cliente2));
    }

    public function testItShouldDepositar()
    {
        $this->assertEquals(250, $this->cliente1->depositar(250));
    }

    public function testItNotShouldDepositar()
    {
        $this->assertEquals(0, $this->cliente1->depositar(-100));
    }

    public function testItNotShouldTranferir()
    {
        $this->assertEquals(0, $this->cliente1->transferir(-100, $this->cliente2));
    }

    public function testItNotShouldSacar()
    {
        $this->assertEquals(0, $this->cliente1->sacar(-100));
    }
}
