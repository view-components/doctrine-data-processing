<?php

namespace ViewComponents\Doctrine;

use Doctrine\DBAL\Query\QueryBuilder;
use ViewComponents\ViewComponents\Data\AbstractDataProvider;
use ViewComponents\ViewComponents\Data\Operation\OperationInterface;

/**
 * Data provider that uses Doctrine DBAL query builder as data source.
 */
class DoctrineDataProvider extends AbstractDataProvider
{
    /**
     * Constructor.
     *
     * @param QueryBuilder $src
     * @param OperationInterface[] $operations
     */
    public function __construct(QueryBuilder $src, array $operations = [])
    {
        $this->operations()->set($operations);
        $this->processingService = new DoctrineProcessingService(
            new DoctrineProcessorResolver(),
            $this->operations(),
            $src
        );
    }
}
