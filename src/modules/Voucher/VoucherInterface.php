<?php

namespace floraqueen\modules\voucher;


use floraqueen\modules\basket\Basket;

interface VoucherInterface {

    function apply(Basket $basket);

} 