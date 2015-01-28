<?php

namespace floraqueen\modules\product;


class ProductA extends Product implements ProductInterface {

    function __construct(){
        $this->price = 10;
    }

} 