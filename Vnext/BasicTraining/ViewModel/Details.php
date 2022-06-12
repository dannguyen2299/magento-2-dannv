<?php
namespace Vnext\BasicTraining\ViewModel;

use Magento\Framework\View\Element\Block\ArgumentInterface;
use Magento\Framework\Url\Helper\Data as UrlHelper;

class Details implements ArgumentInterface
{
    /**
     * @var UrlHelper
     */
    private $urlHelper;

    public function __construct(
        UrlHelper $urlHelper,
        \Vnext\BasicTraining\Model\StudentFactory $student_factory
    )
    {
        $this->student_factory = $student_factory;
        $this->urlHelper = $urlHelper;
    }

    public function getDetails()
    {

        $result = $this->student_factory->create()->load(2);
        return $result;
    }
}
