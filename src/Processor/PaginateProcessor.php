<?php

namespace ViewComponents\Doctrine\Processor;

use Doctrine\DBAL\Query\QueryBuilder;
use ViewComponents\ViewComponents\Data\Operation\OperationInterface;
use ViewComponents\ViewComponents\Data\Operation\PaginateOperation;
use ViewComponents\ViewComponents\Data\Processor\AbstractPaginateProcessor;

/**
 * PaginateOperation processing for DoctrineDataProvider.
 *
 * @see PaginateOperation
 */
class PaginateProcessor extends AbstractPaginateProcessor
{
    /**
     * Applies operation to data source and returns modified data source.
     *
     * @param QueryBuilder $src
     * @param OperationInterface|PaginateOperation $operation
     * @return QueryBuilder
     */
    public function process($src, OperationInterface $operation)
    {
        return $src
            ->setFirstResult($this->getOffset($operation))
            ->setMaxResults($operation->getPageSize());
    }
}
