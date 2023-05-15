<?php

declare(strict_types=1);

namespace App\Domain\GeoIp;

final class GeoIp
{
    private string|null $countryCode;
    private string|null $postalCode;
    private string|null $cityName;
    private string|null $timeZone;
    private int|null $accuracyRadius;

    public function __construct(
        string|null $countryCode,
        string|null $postalCode,
        string|null $cityName,
        string|null $timeZone,
        int|null $accuracyRadius
    )
    {
        $this->countryCode = $countryCode;
        $this->postalCode = $postalCode;
        $this->cityName = $cityName;
        $this->timeZone = $timeZone;
        $this->accuracyRadius = $accuracyRadius;
    }

    public function countryCode(): string|null
    {
        return $this->countryCode;
    }

    public function postalCode(): string|null
    {
        return $this->postalCode;
    }

    public function cityName(): string|null
    {
        return $this->cityName;
    }

    public function timeZone(): string|null
    {
        return $this->timeZone;
    }

    public function accuracyRadius(): int|null
    {
        return $this->accuracyRadius;
    }
}
