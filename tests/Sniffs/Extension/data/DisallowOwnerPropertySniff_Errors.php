<?php

use SilverStripe\ORM\DataExtension;
use SilverStripe\Core\Extension;
use SilverStripe\Core\Extension as SomethingDifferent;

class MyCoolExtension extends DataExtension
{
    function doSomething()
    {
        $own = $this->owner;

        $this->owner->something();

        $this->something();

        return $own;
    }
}

class MyCoolExtension2 extends Extension
{
    function doSomething()
    {
        $own = $this->owner;

        $this->owner->something();

        $this->something();

        return $own;
    }
}

class MyCoolExtension3 extends SomethingDifferent
{
    function doSomething()
    {
        $own = $this->owner;

        $this->owner->something();

        $this->something();

        return $own;
    }
}

