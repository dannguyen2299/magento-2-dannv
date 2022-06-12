<?php

namespace Vnext\BasicTraining\Api\Data;
use Magento\Framework\Api\ExtensibleDataInterface;

/**
 * CMS block interface.
 * @api
 * @since 100.0.2
 */
interface StudentInterface extends ExtensibleDataInterface
{

    const ENTITY_ID = 'entity_id';
    const NAME = 'name';
    const GENDER = 'gender';
    const EMAIL = 'email';
    const ADDRESS = 'address';
    const SLUG = 'slug';
    const DOB = 'dob';

    /**
     * @return int
     */
    public function getEntityId();

    /**
     * @param $id
     * @return int
     */
    public function setEntityId($id);

    /**
     * @return string
     */
    public function getName();

    /**
     * @param $name
     * @return string
     */
    public function setName($name);

    /**
     * @return string
     */
    public function getDob();

    /**
     * @param $dob
     * @return string
     */
    public function setDob($dob);

    /**
     * @return string
     */
    public function getAddress();

    /**
     * @param $address
     * @return string
     */
    public function setAddress($address);

    /**
     * @return int
     */
    public function getGender();

    /**
     * @param $gender
     * @return int
     */
    public function setGender($gender);

    /**
     * @return string
     */
    public function getEmail();

    /**
     * @param $email
     * @return string
     */
    public function setEmail($email);

    /**
     * @return string
     */
    public function getSlug();

    /**
     * @param $slug
     * @return string
     */
    public function setSlug($slug);

}
