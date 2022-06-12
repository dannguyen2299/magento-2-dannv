<?php

namespace Vnext\BasicTraining\Api\Data;

use Magento\Framework\Api\SearchResultsInterface;

interface StudentSearchResultInterface extends SearchResultsInterface
{
    /**
     * @return \Vnext\BasicTraining\Api\Data\StudentInterface[]
     */
    public function getItems();

    /**
     * @param \Vnext\BasicTraining\Api\Data\StudentInterface[] $items
     * @return void
     */
    public function setItems(array $items);
}
