<?php

namespace ViewComponents\Doctrine\Processor;

use Doctrine\DBAL\Query\QueryBuilder;

use ViewComponents\ViewComponents\Data\Operation\FilterOperation;
use ViewComponents\ViewComponents\Data\Operation\OperationInterface;
use ViewComponents\ViewComponents\Data\Processor\ProcessorInterface;

/**
 * FilterOperation processing for DoctrineDataProvider.
 *
 * @see FilterOperation
 */
class FilterProcessor implements ProcessorInterface
{
    /**
     * Applies operation to data source and returns modified data source.
     *
     * @param QueryBuilder $src
     * @param OperationInterface|FilterOperation $operation
     * @return QueryBuilder
     */
    public function process($src, OperationInterface $operation)
    {
        $value = $operation->getValue();
        $operator = $operation->getOperator();
        $fieldName = $operation->getField();
        $parameterName = 'p'. md5($fieldName . $operator);
        $src->andWhere("$fieldName $operator :$parameterName");
        $src->setParameter($parameterName, $value);
        return $src;
    }
}
