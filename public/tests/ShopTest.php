<?php

use PHPUnit\Framework\TestCase;

class ShopTest extends TestCase
{
    public function testAdd() {
        $x = 3;
        $y = 2;
        $this->assertEquals(5, $x + $y);
    }
}