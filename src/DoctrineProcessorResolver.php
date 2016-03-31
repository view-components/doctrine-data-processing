<?php

namespace ViewComponents\Doctrine;

use ViewComponents\Doctrine\Processor\FilterProcessor;
use ViewComponents\Doctrine\Processor\PaginateProcessor;
use ViewComponents\Doctrine\Processor\SortProcessor;
use ViewComponents\ViewComponents\Data\Operation\FilterOperation;
use ViewComponents\ViewComponents\Data\Operation\PaginateOperation;
use ViewComponents\ViewComponents\Data\Operation\SortOperation;
use ViewComponents\ViewComponents\Data\ProcessorResolver\ProcessorResolver;

class DoctrineProcessorResolver extends ProcessorResolver
{
    /**
     * Constructor.
     */
    public function __construct()
    {
        $this
            ->register(SortOperation::class, SortProcessor::class)
            ->register(FilterOperation::class, FilterProcessor::class)
            ->register(PaginateOperation::class, PaginateProcessor::class)
        ;
    }
}
