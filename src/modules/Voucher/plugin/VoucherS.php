<?php

namespace floraqueen\modules\product;


use floraqueen\modules\basket\Basket;
use floraqueen\modules\voucher\VoucherInterface;

class VoucherS extends Voucher implements VoucherInterface {

    function __construct(){
        $this->application_level = 'total';
    }

    function apply(Basket $basket)
    {
        $discount = 0;
        $total = $basket->getTotal();
        if($total > 40){
            $discount = (-0.05*$total);
        }
        return $discount;
    }
}