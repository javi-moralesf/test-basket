<?php

namespace floraqueen\modules\product;


class ProductC extends Product implements ProductInterface {

    function __construct(){
        $this->price = 12;
    }

} 