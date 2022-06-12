<?php
namespace Vnext\BasicTraining\Helper;

use Magento\Framework\App\Helper\Context;
use Magento\Framework\Mail\Template\TransportBuilder;
use Magento\Framework\App\Helper\AbstractHelper;
use Magento\Framework\Translate\Inline\StateInterface;
use Magento\Store\Model\StoreManagerInterface;
use Zend_Mime;

class Email extends AbstractHelper
{
    protected $transportBuilder;
    protected $storeManager;
    protected $inlineTranslation;

    public function __construct(
        Context $context,
        TransportBuilder $transportBuilder,
        StoreManagerInterface $storeManager,
        StateInterface $state
    )
    {
        $this->transportBuilder = $transportBuilder;
        $this->storeManager = $storeManager;
        $this->inlineTranslation = $state;
        parent::__construct($context);
    }

    public function sendEmail($email, $name)
    {
        // this is an example and you can change template id,fromEmail,toEmail,etc as per your need.
        $templateId = 'template_send_email_birthday'; // template id
        $fromEmail = 'dannguyen22993@gmail.com';  // sender Email id
        $fromName = 'Admin';             // sender Name
        $toEmail = $email; // receiver email id
        try {
            // template variables pass here
            $templateVars = [
                'name' => $name,
                'msg1' => 'Happy Birthday To You'
            ];

            $storeId = $this->storeManager->getStore()->getId();

            $from = ['email' => $fromEmail, 'name' => $fromName];
            $this->inlineTranslation->suspend();

            $storeScope = \Magento\Store\Model\ScopeInterface::SCOPE_STORE;
            $templateOptions = [
                'area' => \Magento\Framework\App\Area::AREA_FRONTEND,
                'store' => $storeId
            ];
            $transport = $this->transportBuilder->setTemplateIdentifier($templateId, $storeScope)
                ->setTemplateOptions($templateOptions)
                ->setTemplateVars($templateVars)
                ->setFrom($from)
                ->addTo($toEmail)
                ->getTransport();
            $this->inlineTranslation->resume();
        } catch (\Exception $e) {
            $this->_logger->info($e->getMessage());
        }
    }


}
