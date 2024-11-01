<?php

namespace Alura\Doctrine\Helper;

use Doctrine\DBAL\DriverManager;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\ORMSetup;

class EntityManagerCreator
{
    public static function createEntityManager()
    {
        $config = ORMSetup::createAttributeMetadataConfiguration(
            paths: [__DIR__ . '/src'],
            isDevMode: true,
        );

        // configuring the database connection
        $connection = DriverManager::getConnection([
            'dbname' => 'seu_banco_de_dados',
            'user' => 'seu_usuario',
            'password' => 'sua_senha',
            'host' => 'localhost',
            'driver' => 'pdo_mysql',
        ], $config);

        // obtaining the entity manager
        $entityManager = new EntityManager($connection, $config);

        return $entityManager;
    }
}
