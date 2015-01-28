<?php

use floraqueen\modules\basket\Basket;
use floraqueen\modules\product\ProductA;
use floraqueen\modules\product\ProductB;
use floraqueen\modules\product\ProductC;
use floraqueen\modules\product\VoucherR;
use floraqueen\modules\product\VoucherS;
use floraqueen\modules\product\VoucherV;

class BasketTest extends PHPUnit_Framework_TestCase {

    public function testCartExample1(){
        $this->assertTrue(true);
        $basket = new Basket();
        $basket->addProduct(new ProductA());
        $basket->addProduct(new ProductC());
        $basket->addVoucher(new VoucherS());
        $basket->addProduct(new ProductA());
        $basket->addVoucher(new VoucherV());
        $basket->addProduct(new ProductB());
        $this->assertEquals(39, $basket->calculateTotal());
    }

    public function testCartExample2(){
        $this->assertTrue(true);
        $basket = new Basket();
        $basket->addProduct(new ProductA());
        $basket->addVoucher(new VoucherS());
        $basket->addProduct(new ProductA());
        $basket->addVoucher(new VoucherV());
        $basket->addProduct(new ProductB());
        $basket->addVoucher(new VoucherR());
        $basket->addProduct(new ProductC());
        $basket->addProduct(new ProductC());
        $basket->addProduct(new ProductC());

        $this->assertEquals(55.10, $basket->calculateTotal());
    }
}
 