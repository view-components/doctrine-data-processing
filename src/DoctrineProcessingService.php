<?php

namespace ViewComponents\Doctrine;

use ArrayIterator;
use Doctrine\DBAL\Query\QueryBuilder;
use PDO;
use Traversable;
use ViewComponents\ViewComponents\Data\ProcessingService\AbstractProcessingService;

class DoctrineProcessingService extends AbstractProcessingService
{
    /**
     * @param QueryBuilder $data
     * @return Traversable
     */
    protected function afterOperations($data)
    {
        return new ArrayIterator($data->execute()->fetchAll(PDO::FETCH_OBJ));
    }

    /**
     * @param QueryBuilder $data
     * @return QueryBuilder
     */
    protected function beforeOperations($data)
    {
        return clone $data;
    }

    /**
     * Returns count of processed items after applying all operations.
     *
     * @return int
     */
    public function count()
    {
        /** @var QueryBuilder $builder */
        $builder = $this->applyOperations(
            $this->beforeOperations($this->dataSource)
        );
        $builder->select('count(*) as row_count');
        return $builder->execute()->fetchColumn();
    }
}
