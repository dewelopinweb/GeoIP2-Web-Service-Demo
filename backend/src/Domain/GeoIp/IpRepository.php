<?php

declare(strict_types=1);

namespace App\Domain\GeoIp;

use App\Shared\Domain\ValueObject\IpValueObject;

interface IpRepository
{
    /**
     * @param IpValueObject $ip
     * @return GeoIp
     * @throws IpNotFoundException
     */
    public function city(IpValueObject $ip): GeoIp;
}
