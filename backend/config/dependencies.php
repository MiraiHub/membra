<?php

use App\Domain\Repositories\UserRepositoryInterface;
use App\Infrastructure\Repositories\UserRepository;
use DI\Container;
use Doctrine\DBAL\DriverManager;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\ORMSetup;
use Symfony\Component\Cache\Adapter\ArrayAdapter;
use Symfony\Component\Cache\Adapter\FilesystemAdapter;

return [
    EntityManager::class => static function (Container $container): EntityManager {
        $settings = $container->get('settings');
        $cache = $settings['dev_mode'] ? new ArrayAdapter() : new FilesystemAdapter();
        $config = ORMSetup::createAttributeMetadataConfiguration(
            paths: $settings['db']['metadata_dirs'],
            isDevMode: $settings['dev_mode'],
            cache: $cache,
        );
        $connection = DriverManager::getConnection($settings['db']['connection']);
        return new EntityManager($connection, $config);
    },
    UserRepositoryInterface::class => DI\autowire(UserRepository::class),
];
