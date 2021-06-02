<?php

declare (strict_types=1);
namespace RectorPrefix20210602;

use RectorPrefix20210602\Symfony\Component\DependencyInjection\Loader\Configurator\ContainerConfigurator;
use RectorPrefix20210602\Symplify\EasyCodingStandard\ValueObject\Option;
use RectorPrefix20210602\Symplify\EasyCodingStandard\ValueObject\Set\SetList;
return static function (\RectorPrefix20210602\Symfony\Component\DependencyInjection\Loader\Configurator\ContainerConfigurator $containerConfigurator) : void {
    $containerConfigurator->import(\RectorPrefix20210602\Symplify\EasyCodingStandard\ValueObject\Set\SetList::COMMON);
    $containerConfigurator->import(\RectorPrefix20210602\Symplify\EasyCodingStandard\ValueObject\Set\SetList::PSR_12);
    $parameters = $containerConfigurator->parameters();
    $parameters->set(\RectorPrefix20210602\Symplify\EasyCodingStandard\ValueObject\Option::PATHS, [__DIR__ . '/src', __DIR__ . '/tests']);
};
