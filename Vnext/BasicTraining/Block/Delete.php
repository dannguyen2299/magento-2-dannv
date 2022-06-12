<?php
namespace Vnext\BasicTraining\Block;
use  Vnext\BasicTraining\Model\StudentRepository;
class Delete extends \Magento\Framework\View\Element\Template
{
    public $studentRepository;
    public function __construct(
        \Magento\Framework\View\Element\Template\Context $context,
        \Vnext\BasicTraining\Model\StudentRepository $studentRepository
    )
    {
        $this->studentRepository=$studentRepository;
        parent::__construct($context);
    }

    public function sayHello()
    {
        $detailStudent = $this->studentRepository->getById(1);
        return $detailStudent;
// return __('Delete');
    }
    public function sayHello1()
    {

 return __('Delete');
    }
}
