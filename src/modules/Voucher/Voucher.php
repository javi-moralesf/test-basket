<?php

namespace floraqueen\modules\product;

class Voucher{

    protected $application_level = 'product';

    function getApplicationLevel(){
        return $this->application_level;
    }
}