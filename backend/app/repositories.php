<?php

declare(strict_types=1);

use App\Domain\GeoIp\IpRepository;
use App\Infrastructure\Persistence\GeoIp\InFileGeoIpRepository;
use DI\ContainerBuilder;

return function (ContainerBuilder $containerBuilder) {
    // Interfaces map implementations
    $containerBuilder->addDefinitions([
        IpRepository::class => \DI\autowire(InFileGeoIpRepository::class),
    ]);
};
