<?php

namespace Vnext\BasicTraining\Controller\Index;

use Magento\Framework\Controller\ResultFactory;
use Magento\Framework\Module\Manager;

class Index extends \Magento\Framework\App\Action\Action
{
    protected $resultPageFactory;
    /** @var  \Vnext\BasicTraining\Model\ResourceModel\Student\CollectionFactory */
    protected $studentCollection;
    /**
     * @var \Magento\UrlRewrite\Model\UrlRewriteFactory
     */
    /**
     * @param \Magento\UrlRewrite\Model\UrlRewriteFactory $urlRewriteFactory
     */
    protected $_urlRewriteFactory;
    /** @var \Magento\Framework\App\Config\ScopeConfigInterface */
    protected $scopeConfig;

    public function __construct(
        \Magento\Framework\App\Action\Context                              $context,
        Manager                                                            $moduleManager,
        \Vnext\BasicTraining\Model\ResourceModel\Student\CollectionFactory $studentCollection,
        \Magento\Framework\Controller\Result\ForwardFactory                $forwardFactory,
        \Magento\Framework\App\Config\ScopeConfigInterface                 $scopeConfig,
        \Magento\Framework\View\Result\PageFactory                         $resultPageFactory,
        \Magento\UrlRewrite\Model\UrlRewriteFactory                        $urlRewriteFactory)
    {
        $this->moduleManager = $moduleManager;
        $this->scopeConfig = $scopeConfig;
        $this->studentCollection = $studentCollection;
        $this->_forwardFactory = $forwardFactory;
        $this->resultPageFactory = $resultPageFactory;
        $this->_urlRewriteFactory = $urlRewriteFactory;
        return parent::__construct($context);
    }

    public function execute()
    {
        //main index
        $checkEnableStudent = $this->scopeConfig->getValue('training/page_list_student/field_list_student', \Magento\Store\Model\ScopeInterface::SCOPE_WEBSITE);
        if ($checkEnableStudent == 1) {
            $resultRedirect = $this->resultRedirectFactory->create();
            $resultRedirect->setPath('noRoute');
            return $resultRedirect;
        } else {
            $studentSort = $this->getRequest()->getParam('sort');
            $resultRedirect = $this->resultFactory->create(ResultFactory::TYPE_REDIRECT);
            $resultPage = $this->resultPageFactory->create();
            if ($studentSort) {
                $resultPage->getConfig()->getTitle()->set(__('Page Sort Students'));
            } else {
                $resultPage->getConfig()->getTitle()->set(__('List Students'));
            }
            return $resultPage;
        }

    }

}

//    public function execute()
//    {
//        if ($this->moduleManager->isEnabled('Vnext_BasicTraining')) {
//            $studentSort = $this->getRequest()->getParam('sort');
//            $resultRedirect = $this->resultFactory->create(ResultFactory::TYPE_REDIRECT);
//            $resultPage = $this->resultPageFactory->create();
//            if ($studentSort) {
//                $resultPage->getConfig()->getTitle()->set(__('Page Sort Students'));
//            } else {
//                $resultPage->getConfig()->getTitle()->set(__('List Students'));
//            }
//        } else {
//            $resultPage = $this->_forwardFactory->create();
//            $resultPage->setController('index');
//            $resultPage->forward('defaultNoRoute');
//        }
//        return $resultPage;
//    }
//}


//    function rewriteurl($student_slug, $student_id, $student_index_url, $postfix_url)
//    {
//        //Url rewrite for student
//        $student_index_url = $this->scopeConfig->getValue('training/seo_training/student_index_url', \Magento\Store\Model\ScopeInterface::SCOPE_STORE);
//        $postfix_url = $this->scopeConfig->getValue('training/seo_training/postfix_url', \Magento\Store\Model\ScopeInterface::SCOPE_STORE);
//
//        $collection = $this->studentCollection->create();
//        foreach ($collection as $coll) {
//            $student_id = $coll->getId();
//            $student_slug = $coll->getSlug();
//            $this->rewriteurl($student_slug, $student_id, $student_index_url, $postfix_url);
//        }

//        $urlRewriteModel = $this->_urlRewriteFactory->create();
//        /* set current store id */
////        $urlRewriteModel->setStoreId(1);
//        /* this url is not created by system so set as 0 */
//        $urlRewriteModel->setIsSystem(0);
//        /* unique identifier - set random unique value to id path */
//        $urlRewriteModel->setIdPath(rand(1, 100000));
//        /* set actual url path to target path field */
//        $urlRewriteModel->setTargetPath("/student/index/details/?ids=" . $student_id);
//        /* set requested path which you want to create */
//        $urlRewriteModel->setRequestPath($student_index_url . '/' . $student_slug . '' . $postfix_url);
//        /* set current store id */
//        $urlRewriteModel->save();
//    }
