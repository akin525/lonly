<?php

namespace lonly\Budpay\Test;

use Mockery as m;
use PHPUnit\Framework\TestCase;

class HelpersTest extends TestCase {

    protected $budpay;

    public function setUp(): void
    {
        $this->budpay = m::mock('lonly\Budpay\Budpay');
        $this->mock = m::mock('GuzzleHttp\Client');
    }

    public function tearDown(): void
    {
        m::close();
    }

    /**
     * Tests that helper returns
     *
     * @test
     * @return void
     */
    function it_returns_instance_of_budpay () {

        $this->assertInstanceOf("lonly\Budpay\Budpay", $this->budpay);
    }
}