<?php

namespace floraqueen\modules\product;


use floraqueen\modules\basket\Basket;
use floraqueen\modules\voucher\VoucherInterface;

class VoucherV extends Voucher implements VoucherInterface {

    function __construct(){
        $this->application_level = 'product';
    }

    function apply(Basket $basket)
    {
        $discount = 0;
        $total_a = 0;
        $total_a_price = 0;
        $products = $basket->getProducts();
        foreach($products as $product){
            /** @var Product $product */
            if($product instanceof ProductA){
                $total_a++;
                $total_a_price += $product->getPrice();
            }
        }
        $discount = (int)($total_a/2)*($total_a_price/$total_a)*-0.1;

        return $discount;
    }
}