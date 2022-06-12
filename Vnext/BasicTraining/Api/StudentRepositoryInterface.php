<?php

namespace Vnext\BasicTraining\Api;

use Vnext\BasicTraining\Api\Data\StudentInterface;

interface StudentRepositoryInterface
{
//    /**
//     * @param int $id
//     * @return \Vnext\BasicTraining\Api\Data\StudentInterface
//     * @throws \Magento\Framework\Exception\NoSuchEntityException
//     */
//    public function getById($id);

    /**
     * @param \Vnext\BasicTraining\Api\Data\StudentInterface $Student
     * @return \Vnext\BasicTraining\Api\Data\StudentInterface
     * @throws \Magento\Framework\Exception\CouldNotSaveException
     */
    public function save(\Vnext\BasicTraining\Api\Data\StudentInterface $Student);

    /**
     * @param \Vnext\BasicTraining\Api\Data\StudentInterface $Student
     * @return bool true on success
     * @throws \Magento\Framework\Exception\CouldNotDeleteException
     */
    public function delete(\Vnext\BasicTraining\Api\Data\StudentInterface $Student);

    /**
     * @param \Magento\Framework\Api\SearchCriteriaInterface $searchCriteria
     * @return \Vnext\BasicTraining\Api\Data\StudentSearchResultInterface
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function getList(\Magento\Framework\Api\SearchCriteriaInterface $searchCriteria);

    /**
     * GET for Post api
     * @param string $param
     * @return string
     */

    //public function getPost($param);

    /**
     * @param int $id
     * @return \Vnext\BasicTraining\Api\Data\StudentInterface
     */
    public function getStudentById($id);


    /**
     * @param int $id
     * @return \Vnext\BasicTraining\Api\Data\StudentInterface
     */
    public function deleteById($id);

    /**
     * @param \Vnext\BasicTraining\Api\Data\StudentInterface $student
     * @return \Vnext\BasicTraining\Api\Data\StudentInterface
     */
    public function createStudent();

    /**
     * @param \Vnext\BasicTraining\Api\Data\StudentInterface $student
     * @return \Vnext\BasicTraining\Api\Data\StudentInterface
     */
//    public function updateStudent(\Vnext\BasicTraining\Api\Data\StudentInterface $student);
    public function updateStudent($id);

}
