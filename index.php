<?php
class Product
{
    protected $itemTitle;
    protected $itemPrice;
    protected $isItemInPrice;

    public function __construct($itemTitle = "", $itemPrice = 0, $isItemInPrice = false)
    {
        $this->itemTitle = $itemTitle;
        $this->itemPrice = $itemPrice;
        $this->isItemInPrice = $isItemInPrice;
    }

    public function setPrice($itemPrice)
    {
        $this->itemPrice = $itemPrice;
    }

    public function getItemPrice()
    {
        return $this->itemPrice;
    }

    public function addToPrice()
    {
        $this->isItemInPrice = true;
    }

    public function removeFromPrice()
    {
        $this->isItemInPrice = false;
    }

    public function printInfo()
    {
        echo "Название товара: $this->itemTitle <br>";
        echo "Цена: $this->itemPrice р. <br>";
        echo "Товар " . ($this->isItemInPrice ? "" : "не") . " входит в прайс лист <br>";
    }
}

class Dress extends Product
{
    protected $itemColor;
    protected $itemSize;

    public function __construct($itemTitle = "", $itemPrice = 0, $isItemInPrice = false, $itemColor = null, $itemSize = null)
    {
        parent::__construct($itemTitle, $itemPrice, $isItemInPrice);
        $this->itemColor = $itemColor;
        $this->itemSize = $itemSize;
    }

    public function printInfo()
    {
        parent::printInfo();
        echo "Цвет: $this->itemColor <br>";
        echo "Размер: $this->itemSize <br>";
    }
}

class Book extends Product
{
    protected $itemAuthor;

    public function __construct($itemTitle = "", $itemPrice = 0, $isItemInPrice = false, $itemAuthor = null)
    {
        parent::__construct($itemTitle, $itemPrice, $isItemInPrice);
        $this->itemAuthor = $itemAuthor;
    }

    public function printInfo()
    {
        echo "Наименование: $this->itemAuthor - \"$this->itemTitle\"<br>";
        echo "Цена: $this->itemPrice <br>";
        echo "Товар " . ($this->isItemInPrice ? "" : "не") . " входит в прайс лист <br>";
    }
}

$dress1 = new Dress("Короткое платье", 1500, false, "Чёрный", "S");
$book1 = new Book("В поисках сокровищ", 890, false, "Антон Искатель");

$dress1->addToPrice();
$dress1->printInfo();

$book1->addToPrice();
$book1->printInfo();