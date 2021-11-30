<?php

declare (strict_types=1);
namespace RectorPrefix20211130\Symplify\SymplifyKernel\Contract\Config;

use RectorPrefix20211130\Symfony\Component\Config\Loader\LoaderInterface;
use RectorPrefix20211130\Symfony\Component\DependencyInjection\ContainerBuilder;
interface LoaderFactoryInterface
{
    /**
     * @param \Symfony\Component\DependencyInjection\ContainerBuilder $containerBuilder
     * @param string $currentWorkingDirectory
     */
    public function create($containerBuilder, $currentWorkingDirectory) : \RectorPrefix20211130\Symfony\Component\Config\Loader\LoaderInterface;
}
