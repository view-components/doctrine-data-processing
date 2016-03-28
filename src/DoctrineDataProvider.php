<?php

namespace ViewComponents\Doctrine;

use Doctrine\DBAL\Query\QueryBuilder;
use ViewComponents\ViewComponents\Data\AbstractDataProvider;

class DoctrineDataProvider extends AbstractDataProvider
{
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
