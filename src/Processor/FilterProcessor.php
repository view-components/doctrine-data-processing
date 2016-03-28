<?php

namespace ViewComponents\Doctrine\Processor;

use Doctrine\DBAL\Query\QueryBuilder;

use ViewComponents\ViewComponents\Data\Operation\FilterOperation;
use ViewComponents\ViewComponents\Data\Operation\OperationInterface;
use ViewComponents\ViewComponents\Data\Processor\ProcessorInterface;

class FilterProcessor implements ProcessorInterface
{
    /**
     * @param QueryBuilder $src
     * @param OperationInterface|FilterOperation $operation
     * @return QueryBuilder
     */
    public function process($src, OperationInterface $operation)
    {
        $value = $operation->getValue();
        $operator = $operation->getOperator();
        $fieldName = $operation->getField();
        $parameterName = str_replace(".", "_", $fieldName);// @see https://github.com/Nayjest/Grids/issues/111
        $src->andWhere("$fieldName $operator :$parameterName");
        $src->setParameter($parameterName, $value);
        return $src;
    }
}
