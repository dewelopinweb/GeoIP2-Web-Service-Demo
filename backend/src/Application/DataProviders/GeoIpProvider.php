<?php

declare(strict_types=1);

namespace App\Application\DataProviders;

use GeoIp2\Database\Reader;

class GeoIpProvider extends Reader implements GeoIpProviderInterface
{
}
