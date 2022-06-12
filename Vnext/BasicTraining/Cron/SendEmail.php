<?php

namespace Vnext\BasicTraining\Cron;

use Magento\Framework\Mail\Template\TransportBuilder;
use Vnext\BasicTraining\Helper\Email;
class SendEmail
{
    private $logger;
    private $helperMail;
    private $studentFactory;
    private $collection;
    /**
     * @var TransportBuilder
     */
    private $transportBuilder;

    public function __construct(
        \Psr\Log\LoggerInterface                  $logger,
        TransportBuilder                          $transportBuilder,
        \Vnext\BasicTraining\Helper\Email         $helperMail,
        \Vnext\BasicTraining\Model\StudentFactory $studentFactory

    )
    {
        $this->logger = $logger;
        $this->transportBuilder = $transportBuilder;
        $this->helperMail = $helperMail;
        $this->studentFactory = $studentFactory;
        $this->collection = $this->getStudentCollection();


    }

    public function getStudentCollection()
    {
        $collection = $this->studentFactory->create()->getCollection();
        return $collection;
    }

    /**
     * Execute the cron
     *
     * @return SendEmail
     */

    public function execute()
    {
        $students = $this->collection;
        foreach ($students as $student) {
            $dayStudent = date('j', strtotime($student['dob']));
            $dayNow = date('j', time());
            $monthStudent = date('F', strtotime($student['dob']));
            $monthNow = date('F', time());
            if (($dayStudent == $dayNow) && ($monthStudent == $monthNow)) {
                $email = $student['email'];
                $name = $student['name'];
                return   $this->helperMail->sendEmail($email, $name);

            }
        }


    }

}
