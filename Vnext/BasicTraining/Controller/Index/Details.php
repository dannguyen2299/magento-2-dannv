<?php
/**
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */

namespace Vnext\BasicTraining\Controller\Index;

use Magento\Framework\App\Action\HttpGetActionInterface;

/**
 * Edit CMS block action.
 */
class Details extends \Magento\Framework\App\Action\Action
{
    /** @var  \Magento\Framework\View\Result\Page */
    protected $resultPageFactory;

    public function __construct(
        \Magento\Framework\App\Action\Context $context,
        \Magento\Framework\View\Result\PageFactory $resultPageFactory
    )
    {
        $this->resultPageFactory = $resultPageFactory;
        parent::__construct($context);
    }
    public function execute()
    {
        $ids =$this->getRequest()->getParam('ids');
        return $this->resultPageFactory->create();
    }
}
