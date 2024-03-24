<?php

declare(strict_types=1);

namespace Tests;

use PHPUnit\Framework\TestCase;

// run tests ".\vendor\bin\phpunit tests"
class DemoTest extends TestCase
{

    public function testTrueIsTrue()
    {
        $foo = true;
        $this->assertTrue($foo);
    }
}
