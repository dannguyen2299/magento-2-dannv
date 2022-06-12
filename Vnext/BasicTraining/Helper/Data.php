<?php

namespace Vnext\BasicTraining\Helper;

use Magento\Framework\App\Area;
use Magento\Framework\Filesystem\Io\File;
use Magento\Framework\Mail\Template\TransportBuilder;
use Zend_Mime;
use Magento\Email\Model\BackendTemplate;
use Magento\Framework\App\Helper\Context;
use Magento\Store\Model\StoreManagerInterface;
use Zend\Mime\PartFactory;
use Laminas\Mime\Part;
use Laminas\Mime\Message;

/**
 * Class Data
 * @package Vendor\Module\Helper
 */
class Data extends \Magento\Framework\App\Helper\AbstractHelper
{
    /**
     * @var TransportBuilder
     */
    protected $transportBuilder;

    /**
     * @var File
     */
    protected $file;

    /**
     * @var BackendTemplate
     */
    protected $emailTemplate;

    /**
     * @var StoreManagerInterface
     */
    protected $storeManager;

    /**
     * @var PartFactory
     */
    protected $partFactory;

    /**
     * @var Message
     */
    protected $message;

    /**
     * Mail constructor.
     *
     * @param Context $context
     * @param TransportBuilder $transportBuilder
     * @param StoreManagerInterface $storeManager
     * @param File $file
     * @param PartFactory $partFactory
     * @param Message $message
     * @param BackendTemplate $emailTemplate
     */
    public function __construct(
        Context $context,
        TransportBuilder $transportBuilder,
        StoreManagerInterface $storeManager,
        File $file,
        PartFactory $partFactory,
        Message $message,
        BackendTemplate $emailTemplate
    ) {
        parent::__construct($context);
        $this->transportBuilder = $transportBuilder;
        $this->storeManager = $storeManager;
        $this->file = $file;
        $this->partFactory = $partFactory;
        $this->message = $message;
        $this->emailTemplate = $emailTemplate;
    }
    /**
     * Send the email for a Help Center submission.
     *
     * @return void
     */
    public function send()
    {
        // Đường dẫn đến file dự định sẽ đính kèm vào mail
        $file = '/var/www/html/magento2/pub/media/birthday.pdf';
        $storeId = $this->storeManager->getStore()->getId();
        $templateIdentifier = 'template_send_email';

        $templateVars = [
            'msg1' => 'Happy Birthday To You'
        ];

        // Build transport
        /** @var \Magento\Framework\Mail\TransportInterface $transport */
        $transport = $this->transportBuilder
            ->setTemplateOptions(['area' => Area::AREA_FRONTEND, 'store' => $storeId])
            ->setTemplateIdentifier($templateIdentifier)
            ->setTemplateVars($templateVars)
            ->setFromByScope('general')
            ->addTo('babydontcry991212@gmail.com')
            ->getTransport();

        $transport = $this->addAttachment(
            $transport,
            $this->createAttachment($file)
        );

        // Send transport
        $transport->sendMessage();
    }

    /**
     * Create an zend mime part that is an attachment to attach to the email.
     *
     * This was my usecase, you'll need to edit this to your own needs.
     *
     * @param string $file
     * @return Part
     */
    protected function createAttachment(string $file): Part
    {
        $attachment = new Part($this->file->read($file));
        $attachment->disposition = Zend_Mime::TYPE_OCTETSTREAM;
        $attachment->encoding = Zend_Mime::ENCODING_BASE64;
        $attachment->setType('application/pdf');
        $attachment->filename = 'birthday-pdf';

        return $attachment;
    }

    /**
     * @param $transport
     * @param $pdfString
     * @return mixed
     */
    public function addAttachment($transport, $pdfString)
    {
        $bodyHtml = $this->partFactory->create();
        $bodyHtml->setContent($transport->getMessage()->getBody()->generateMessage())
            ->setType('text/html');

        $bodyPart = $this->message->addPart($bodyHtml)->addPart($pdfString);
        $transport->getMessage()->setBody($bodyPart);
        return $transport;
    }
}
