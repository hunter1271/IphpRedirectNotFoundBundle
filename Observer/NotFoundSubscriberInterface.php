<?php

namespace Iphp\RedirectNotFoundBundle\Observer;

interface NotFoundSubscriberInterface extends NotFoundObserverInterface
{
    /**
     * @return array
     */
    public static function getPaths();
}