<?php

namespace floraqueen\modules\product;


class ProductB extends Product implements ProductInterface {

    function __construct(){
        $this->price = 8;
    }

} 