<?php
declare(strict_types=1);

use App\Domain\Country\CountryRepository;
use DI\ContainerBuilder;

return function (ContainerBuilder $containerBuilder) {
    // Here we map our UserRepository interface to its in memory implementation
    $containerBuilder->addDefinitions([
        CountryRepository::class => \DI\autowire(CountryRepository::class),
    ]);
};
