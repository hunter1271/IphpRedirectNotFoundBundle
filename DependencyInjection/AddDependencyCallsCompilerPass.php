<?php

namespace Iphp\RedirectNotFoundBundle\DependencyInjection;

use Symfony\Component\DependencyInjection\Definition;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Compiler\CompilerPassInterface;
use Symfony\Component\DependencyInjection\Reference;
use Symfony\Component\DependencyInjection\ContainerInterface;


class AddDependencyCallsCompilerPass implements CompilerPassInterface
{

    public function process(ContainerBuilder $container)
    {
        $observers =  array();

        $pool = $container->getDefinition('iphp.redirectnotfound.observer_pool');

        foreach ($container->findTaggedServiceIds('iphp.redirectnotfound.observer') as $id => $tags) {
            $observer= $container->getDefinition($id);
            $arguments = $observer->getArguments();

            //First argument - prefix of url
            $observers[$id] = $arguments[0];
        }

        $pool->addMethodCall('setObservers',  [$observers]);

    }


}
