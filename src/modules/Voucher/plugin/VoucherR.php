<?php

namespace floraqueen\modules\product;


use floraqueen\modules\basket\Basket;
use floraqueen\modules\voucher\VoucherInterface;

class VoucherR extends Voucher implements VoucherInterface {

    function __construct(){
        $this->application_level = 'product';
    }

    function apply(Basket $basket)
    {
        $discount = 0;
        $products = $basket->getProducts();
        foreach($products as $product){
            /** @var Product $product */
            if($product instanceof ProductB){
                $discount -= 5;
            }
        }
        return $discount;
    }
}