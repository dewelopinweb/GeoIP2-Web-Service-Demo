<?php

declare(strict_types=1);

namespace App\Application\Actions\GeoIp;

use App\Shared\Domain\ValueObject\IpValueObject;
use Psr\Http\Message\ResponseInterface as Response;

class CityAction extends IpAction
{
    /**
     * {@inheritdoc}
     */
    protected function action(): Response
    {
        $queryParams = $this->request->getQueryParams();

        $ip = $queryParams['ip'] ?? null;

        $ipLookup = $this->ipRepository->city(new IpValueObject($ip));

        $this->logger->info("IP `$ip` was viewed.");

        return $this->respondWithData([
            'countryCode' => $ipLookup->countryCode(),
            'postalCode' => $ipLookup->postalCode(),
            'cityName' => $ipLookup->cityName(),
            'timeZone' => $ipLookup->timeZone(),
            'accuracyRadius' => $ipLookup->accuracyRadius(),
        ]);
    }
}