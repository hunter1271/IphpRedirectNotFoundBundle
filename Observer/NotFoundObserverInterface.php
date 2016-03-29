<?php

namespace Iphp\RedirectNotFoundBundle\Observer;

interface NotFoundObserverInterface
{
    /**
     * @param string       $uri
     *
     * @return string|null
     */
    public function findRedirect($uri);
}
