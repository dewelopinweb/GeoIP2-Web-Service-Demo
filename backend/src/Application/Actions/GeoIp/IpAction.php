<?php

declare(strict_types=1);

namespace App\Application\Actions\GeoIp;

use App\Application\Actions\Action;
use App\Domain\GeoIp\IpRepository;
use Psr\Log\LoggerInterface;

abstract class IpAction extends Action
{
    protected IpRepository $ipRepository;

    public function __construct(LoggerInterface $logger, IpRepository $ipRepository)
    {
        parent::__construct($logger);
        $this->ipRepository = $ipRepository;
    }
}
