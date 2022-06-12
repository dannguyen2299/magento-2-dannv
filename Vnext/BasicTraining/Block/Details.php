<?php

namespace Vnext\BasicTraining\Block;

use Magento\Framework\View\Element\Template\Context;

class Details extends \Magento\Framework\View\Element\Template
{
    /** @var  \Vnext\BasicTraining\Model\StudentFactory */
    protected $student_factory;

    public function __construct(
        Context                                            $context,

        \Vnext\BasicTraining\Model\StudentFactory          $student_factory,
        \Magento\Framework\App\Config\ScopeConfigInterface $scopeConfig

    )
    {
        $this->student_factory = $student_factory;
        $this->scopeConfig = $scopeConfig;

        parent::__construct($context);
    }


    public function getDetails()
    {


        $ids = $this->getRequest()->getParam('ids');
        $result = $this->student_factory->create()->load($ids);
        return $result;
    }

}
