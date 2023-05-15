<?php

declare(strict_types=1);

use App\Application\Settings\SettingsInterface;
use DI\ContainerBuilder;
use Monolog\Handler\StreamHandler;
use Monolog\Logger;
use Monolog\Processor\UidProcessor;
use Psr\Container\ContainerInterface;
use Psr\Log\LoggerInterface;
use App\Application\DataProviders\GeoIpProviderInterface;
use App\Application\DataProviders\GeoIpProvider;

return function (ContainerBuilder $containerBuilder) {
    $containerBuilder->addDefinitions([
        LoggerInterface::class => function (ContainerInterface $c) {
            $settings = $c->get(SettingsInterface::class);

            $loggerSettings = $settings->get('logger');
            $logger = new Logger($loggerSettings['name']);

            $processor = new UidProcessor();
            $logger->pushProcessor($processor);

            $handler = new StreamHandler($loggerSettings['path'], $loggerSettings['level']);
            $logger->pushHandler($handler);

            return $logger;
        },
        GeoIpProviderInterface::class => function (ContainerInterface $c) {
            $settings = $c->get(SettingsInterface::class);

            $geoipSettings = $settings->get('geoip');

            return new GeoIpProvider($geoipSettings['filename'], $geoipSettings['locales']);
        }
    ]);
};
