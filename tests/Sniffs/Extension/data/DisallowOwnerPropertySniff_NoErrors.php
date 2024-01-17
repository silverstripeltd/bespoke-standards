<?php

use SilverStripe\ORM\DataExtension;
use SilverStripe\Fake\Extension;

class MyCoolExtension extends DataExtension
{
    function doSomething()
    {
        $own = $this->getOwner();

        $this->getOwner->something();

        $this->something();

        return $own;
    }
}

class MyCoolExtension extends Extension
{
    function adasd()
    {
        // commend
        $own = $this->owner;

        $this->owner->doS();

        $this->something();

        return $own;
    }
}
