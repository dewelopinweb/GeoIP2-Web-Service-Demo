<?php

declare(strict_types=1);

namespace App\Application\DataProviders;

interface GeoIpProviderInterface
{
    public function country(string $ipAddress);

    public function city(string $ipAddress);
}