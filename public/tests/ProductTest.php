<?php

use app\model\entities\Product;
use PHPUnit\Framework\TestCase;

class ProductTest extends TestCase
{
    /**
     * @dataProvider providerProduct
     */
    public function testProduct($name, $description, $price)
    {
        $product = new Product($name, $description, $price);

        $this->assertEquals($name, $product->name);
        $this->assertEquals($description, $product->description);
        $this->assertEquals($price, $product->price);
    }

    public function providerProduct()
    {
        return array (
            array ("Шорты", "Шорты летние, спортивные", 1200),
            array ("Jacket", "Modern gray jacket", 999),
            array ("Юбка", "Красная", 5000)
        );
    }

    public function testNamespace()
    {
        $namespace = explode("\\", Product::class);

        $this->assertEquals('app', $namespace[0]);
        $this->assertEquals('model', $namespace[1]);
        $this->assertEquals('entities', $namespace[2]);
        $this->assertEquals('Product', $namespace[3]);
    }
}