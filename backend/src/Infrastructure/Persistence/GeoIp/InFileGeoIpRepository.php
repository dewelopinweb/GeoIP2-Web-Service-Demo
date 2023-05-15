<?php

declare(strict_types=1);

namespace App\Infrastructure\Persistence\GeoIp;

use App\Domain\GeoIp\IpRepository;
use App\Domain\GeoIp\GeoIp;
use App\Shared\Domain\ValueObject\IpValueObject;
use App\Application\DataProviders\GeoIpProviderInterface;

class InFileGeoIpRepository implements IpRepository
{
    /**
     * @var GeoIpProviderInterface
     */
    private GeoIpProviderInterface $geoIpProvider;

    /**
     * @param GeoIpProviderInterface $geoIpProvider
     */
    public function __construct(GeoIpProviderInterface $geoIpProvider)
    {
        $this->geoIpProvider = $geoIpProvider;
    }
    /**
     * {@inheritdoc}
     */
    public function city(IpValueObject $ip): GeoIp
    {
        $record = $this->geoIpProvider->city($ip->value());

        return new GeoIp(
            $record->country->isoCode,
            $record->postal->code,
            $record->city->name,
            $record->location->timeZone,
            $record->location->accuracyRadius
        );
    }
}
