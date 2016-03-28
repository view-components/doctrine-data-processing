<?php

namespace ViewComponents\Doctrine\Processor;

use Doctrine\DBAL\Query\QueryBuilder;
use ViewComponents\ViewComponents\Data\Operation\OperationInterface;
use ViewComponents\ViewComponents\Data\Operation\PaginateOperation;
use ViewComponents\ViewComponents\Data\Processor\AbstractPaginateProcessor;

class PaginateProcessor extends AbstractPaginateProcessor
{
    /**
     * @param QueryBuilder $src
     * @param OperationInterface|PaginateOperation $operation
     * @return QueryBuilder
     */
    public function process($src, OperationInterface $operation)
    {
        return $src
            ->setFirstResult($this->getOffset($operation))
            ->setMaxResults($this->getOffset($operation));
    }
}
