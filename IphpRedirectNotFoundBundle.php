<?php

namespace Iphp\RedirectNotFoundBundle;

use Iphp\RedirectNotFoundBundle\DependencyInjection\AddDependencyCallsCompilerPass;
use Symfony\Component\HttpKernel\Bundle\Bundle;

use Symfony\Component\DependencyInjection\ContainerBuilder;

class IphpRedirectNotFoundBundle extends Bundle
{

    /**
     * {@inheritDoc}
     */
    public function build(ContainerBuilder $container)
    {
        $container->addCompilerPass(new AddDependencyCallsCompilerPass());

    }
}
