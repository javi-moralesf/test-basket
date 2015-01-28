<?php

namespace floraqueen\modules\basket;


use floraqueen\modules\product\Product;
use floraqueen\modules\product\ProductInterface;
use floraqueen\modules\product\Voucher;
use floraqueen\modules\voucher\VoucherInterface;

class Basket {

    private $products = array();
    private $vouchers = array();
    private $total = 0;

    public function addProduct(ProductInterface $product){
        $this->products[] = $product;
    }

    public function addVoucher(VoucherInterface $voucher){
        if(in_array($voucher, $this->vouchers)){
            throw new VoucherAlreadyAddedException();
        }
        $this->vouchers[] = $voucher;
    }

    public function calculateTotal(){
        $this->total = $this->calculateProductsPrice();
        $postpone = array();
        foreach($this->vouchers as $voucher){
            /** @var VoucherInterface $voucher */
            if($voucher->getApplicationLevel() == 'product')
                $this->total += $voucher->apply($this);
            else
                $postpone[] = $voucher;
        }
        foreach($postpone as $voucher){
            /** @var VoucherInterface $voucher */
            $this->total += $voucher->apply($this);
        }
        return $this->total;
    }

    public function calculateProductsPrice()
    {
        $total = 0;
        foreach($this->products as $product){
            /** @var Product $product */
            $total += $product->getPrice();
        }
        return $total;
    }

    public function getProducts()
    {
        return $this->products;
    }

    public function getTotal()
    {
        return $this->total;
    }
} 