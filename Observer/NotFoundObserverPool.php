<?php

namespace Iphp\RedirectNotFoundBundle\Observer;


use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\DependencyInjection\ContainerAware;

class NotFoundObserverPool extends ContainerAware
{


    /**
     * @var array
     */
    protected $observersByPath = array();


    public function __construct(ContainerInterface $container)
    {
        $this->container = $container;
    }


    public function setObservers($observers)
    {
        foreach ($observers as $serviceId => $path)
        {
            if (!isset($this->observersByPath[$path]))  $this->observersByPath[$path] = [];

            $this->observersByPath[$path][] = $serviceId;
        }

    }


    public function findRedirect ($uri)
    {

        foreach ($this->observersByPath as $path => $serviceIds)
        {
            if (substr ($uri,0, strlen($path)) == $path) return $this->findRedirectInServices ($uri, $serviceIds);
        }

        return null;
    }


    public function findRedirectInServices ($uri,  $serviceIds)
    {
        foreach ($serviceIds as $serviceId)
        {
            $redirectUri =  $this->container->get($serviceId)->findRedirect ($uri);
            if (!is_null($redirectUri)) return $redirectUri;
        }

       return null;
    }

}