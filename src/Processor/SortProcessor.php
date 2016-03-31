<?php

namespace ViewComponents\Doctrine\Processor;

use Doctrine\DBAL\Query\QueryBuilder;
use ViewComponents\ViewComponents\Data\Operation\OperationInterface;
use ViewComponents\ViewComponents\Data\Operation\SortOperation;
use ViewComponents\ViewComponents\Data\Processor\ProcessorInterface;

/**
 * SortOperation processing for DoctrineDataProvider.
 *
 * @see SortOperation
 */
class SortProcessor implements ProcessorInterface
{
    /**
     * Applies operation to data source and returns modified data source.
     *
     * @param QueryBuilder $src
     * @param OperationInterface|SortOperation $operation
     * @return QueryBuilder
     */
    public function process($src, OperationInterface $operation)
    {
        $field = $operation->getField();
        $order = $operation->getOrder();
        $src->orderBy($field, $order);
        return $src;
    }
}
