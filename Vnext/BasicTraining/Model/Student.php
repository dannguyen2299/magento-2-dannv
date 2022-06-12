<?php

namespace Vnext\BasicTraining\Model;

use \Vnext\BasicTraining\Api\Data\StudentInterface;

class Student extends \Magento\Framework\Model\AbstractModel implements StudentInterface
{
    public function _construct()
    {
        $this->_init('Vnext\BasicTraining\Model\ResourceModel\Student');
    }

    /**
     * @inheritDoc
     */
    public function getId()
    {
        return parent::getData(self::ENTITY_ID);
    }

    /**
     * @inheritDoc
     */
    public function setId($entityId)
    {
        return $this->setData(self::ENTITY_ID, $entityId);
    }

    /**
     * @inheritDoc
     */
    public function getName()
    {
        return parent::getData(self::NAME);
    }

    /**
     * @inheritDoc
     */
    public function setName($name)
    {
        return $this->setData(self::NAME, $name);
    }

    /**
     * @inheritDoc
     */
    public function getDob()
    {
        return parent::getData(self::DOB);
    }

    /**
     * @inheritDoc
     */
    public function setDob($dob)
    {
        return $this->setData(self::DOB, $dob);
    }

    /**
     * @inheritDoc
     */
    public function getAddress()
    {
        return parent::getData(self::ADDRESS);
    }

    /**
     * @inheritDoc
     */
    public function setAddress($address)
    {
        return $this->setData(self::ADDRESS, $address);
    }

    /**
     * @inheritDoc
     */
    public function getGender()
    {
        return parent::getData(self::GENDER);
    }

    /**
     * @inheritDoc
     */
    public function setGender($gender)
    {
        return $this->setData(self::GENDER, $gender);
    }

    /**
     * @inheritDoc
     */
    public function getEmail()
    {
        return parent::getData(self::EMAIL);
    }

    /**
     * @inheritDoc
     */
    public function setEmail($email)
    {
        return $this->setData(self::EMAIL, $email);
    }
    /**
     * @inheritDoc
     */
    public function setSlug($slug)
    {
        return $this->setData(self::SLUG, $slug);
    }
    /**
     * @inheritDoc
     */
    public function getSlug()
    {
        return parent::getData(self::SLUG);
    }

    /**
     * @inheritDoc
     */
    public function getExtensionAttributes()
    {
        return $this->_getExtensionAttributes();
    }


}
