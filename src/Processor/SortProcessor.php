<?php

namespace ViewComponents\Doctrine\Processor;

use Doctrine\DBAL\Query\QueryBuilder;
use ViewComponents\ViewComponents\Data\Operation\OperationInterface;
use ViewComponents\ViewComponents\Data\Operation\SortOperation;
use ViewComponents\ViewComponents\Data\Processor\ProcessorInterface;

class SortProcessor implements ProcessorInterface
{
    /**
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
