<?php

declare(strict_types=1);

namespace App\Domain\GeoIp;

use App\Domain\DomainException\DomainRecordNotFoundException;

class IpNotFoundException extends DomainRecordNotFoundException
{
    public $message = 'IP not found';
}
