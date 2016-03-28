<?php

namespace ViewComponents\Doctrine\Test;

use Doctrine\DBAL\Query\QueryBuilder;
use ViewComponents\Doctrine\DoctrineDataProvider;
use ViewComponents\Doctrine\Test\Helper\Connection;

trait DoctrineTestTrait
{
    /** @var DoctrineDataProvider  */
    protected $provider;

    protected function getDataProvider()
    {
        if (!$this->provider) {
            $builder = new QueryBuilder(Connection::get());
            $builder
                ->select('*')
                ->from('test_users');
            $this->provider = new DoctrineDataProvider($builder);
        }
        return $this->provider;
    }
}