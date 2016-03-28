<?php

namespace ViewComponents\Doctrine\Test;

use Doctrine\DBAL\Query\QueryBuilder;
use ViewComponents\Doctrine\Test\Helper\Connection;
use ViewComponents\Doctrine\DoctrineProcessingService;
use ViewComponents\Doctrine\DoctrineProcessorResolver;
use ViewComponents\ViewComponents\Data\OperationCollection;
use ViewComponents\ViewComponents\Test\Data\AbstractProcessingServiceTest;

require __DIR__ .'/../../vendor/view-components/view-components/tests/phpunit/Data/AbstractProcessingServiceTest.php';

class DoctrineProcessingServiceTest extends AbstractProcessingServiceTest
{
    public function setUp()
    {
        $builder = new QueryBuilder(Connection::get());
        $builder
            ->select('*')
            ->from('test_users');

        $this->data = $builder->execute()->fetchAll(\PDO::FETCH_OBJ);
        $this->operations = new OperationCollection();
        $this->service = new DoctrineProcessingService(
            new DoctrineProcessorResolver(),
            $this->operations,
            $builder
        );

        $this->totalCount = (new QueryBuilder(Connection::get()))
            ->select('count(*)')
            ->from('test_users')
            ->execute()
            ->fetchColumn();
        self::assertTrue($this->totalCount > 0);
    }
}