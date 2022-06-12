<?php
declare(strict_types=1);

namespace Vnext\BasicTraining\Controller;


use Magento\Framework\App\Action\Forward;
use Magento\Framework\App\ActionFactory;
use Magento\Framework\App\ActionInterface;
use Magento\Framework\App\RequestInterface;
use Magento\Framework\App\ResponseInterface;
use Magento\Framework\App\RouterInterface;


class StudentDetailRouter implements RouterInterface
{
    protected $actionFactory;
    protected $response;
    protected $scopeConfig;
    protected $studentCollection;

    public function __construct(
        ActionFactory                                                      $actionFactory,
        ResponseInterface                                                  $response,
        \Vnext\BasicTraining\Model\ResourceModel\Student\CollectionFactory $studentCollection,

        \Magento\Framework\App\Config\ScopeConfigInterface                 $scopeConfig

    )
    {
        $this->actionFactory = $actionFactory;
        $this->scopeConfig = $scopeConfig;
        $this->response = $response;
        $this->studentCollection = $studentCollection;

    }

    public function match(RequestInterface $request): ?ActionInterface
    {
        //Url rewrite for student
        $student_index_url = $this->scopeConfig->getValue('training/seo_training/student_index_url', \Magento\Store\Model\ScopeInterface::SCOPE_STORE);
        $postfix_url = $this->scopeConfig->getValue('training/seo_training/postfix_url', \Magento\Store\Model\ScopeInterface::SCOPE_STORE);

        $collection = $this->studentCollection->create();
        foreach ($collection as $student) {
            $student_id = $student->getId();
            $student_slug = $student->getSlug();
            $identifier = trim($request->getPathInfo(), '/');

            if ((strpos($identifier, $student_slug) !== false) && (strpos($identifier, $student_index_url) !== false) && (strpos($identifier, $postfix_url) !== false)) {
                $request->setModuleName('student');
                $request->setControllerName('index');
                $request->setActionName('details');
                $request->setParams([
                    'ids' => $student_id,
                ]);
                return $this->actionFactory->create(Forward::class, ['request' => $request]);
            }
        }

        return null;
    }
}

?>
