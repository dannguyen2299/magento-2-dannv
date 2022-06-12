<?php
namespace Vnext\BasicTraining\Model\ResourceModel\Student;
class Collection extends \Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection
{
    protected $_idFieldName = 'entity_id';

    protected function _construct()
    {
        $this->_init('Vnext\BasicTraining\Model\Student', 'Vnext\BasicTraining\Model\ResourceModel\Student');
    }
}
