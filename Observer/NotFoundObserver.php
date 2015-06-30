<?php
/**
 * @author Vitiko <vitiko@mail.ru>
 */

namespace Iphp\RedirectNotFoundBundle\Observer;


abstract class NotFoundObserver {




    protected $basePath;

    function __construct($basePath)
    {
        $this->basePath = $basePath;
    }


    abstract function findRedirect($uri);


} 