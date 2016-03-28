<?php

namespace ViewComponents\Doctrine\Test;

use ViewComponents\ViewComponents\Test\Data\AbstractFilterTest;

require_once __DIR__ .'/../../vendor/view-components/view-components/tests/phpunit/Data/AbstractFilterTest.php';

class FilterTest extends AbstractFilterTest
{
    use DoctrineTestTrait;
}
