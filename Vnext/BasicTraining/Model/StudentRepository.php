<?php

namespace Vnext\BasicTraining\Model;

use Magento\Framework\Api\SearchCriteria\CollectionProcessorInterface;
use Magento\Framework\Api\SearchCriteriaInterface;
use Magento\Framework\Exception\CouldNotDeleteException;
use Magento\Framework\Exception\NoSuchEntityException;
use Vnext\BasicTraining\Api\Data\StudentInterface;
use Vnext\BasicTraining\Api\Data\StudentSearchResultInterface;
use Vnext\BasicTraining\Api\StudentRepositoryInterface;
use Vnext\BasicTraining\Model\ResourceModel\Student;
use Vnext\BasicTraining\Model\ResourceModel\Student\CollectionFactory;
use Magento\Framework\App\RequestInterface;

/**
 * Class StudentRepository
 * @author Suman kar(suman.jis@gmail.com)
 */
class StudentRepository implements StudentRepositoryInterface
{

    /**
     * @var studentFactory
     */
    private $studentFactory;

    /**
     * @var Student
     */
    private $studentResource;

    /**
     * @var StudentCollectionFactory
     */
    private $studentCollectionFactory;

    /**
     * @var StudentSearchResultInterfaceFactory
     */
    private $searchResultFactory;
    /**
     * @var CollectionProcessorInterface
     */
    private $collectionProcessor;

    /**
     * @var RequestInterface
     */
    protected $request;
    protected $json;
    public function __construct(
        StudentFactory               $studentFactory,
        Student                      $studentResource,
        CollectionFactory            $studentCollectionFactory,
        StudentSearchResultInterface $studentSearchResultInterfaceFactory,
        CollectionProcessorInterface $collectionProcessor,
        RequestInterface             $request,
        \Magento\Framework\Serialize\Serializer\Json $json
    )
    {
        $this->json = $json;
        $this->studentFactory = $studentFactory;
        $this->studentResource = $studentResource;
        $this->studentCollectionFactory = $studentCollectionFactory;
        $this->searchResultFactory = $studentSearchResultInterfaceFactory;
        $this->collectionProcessor = $collectionProcessor;
        $this->request = $request;
    }

    /**
     * @param int $id
     * @return \Vnext\BasicTraining\Api\Data\StudentInterface
     * @throws \Magento\Framework\Exception\NoSuchEntityException
     */
//    public function getById($id)
//    {
//        $Student = $this->StudentFactory->create();
//        $this->StudentResource->load($Student, $id);
//        if (!$Student->getId()) {
//            throw new NoSuchEntityException(__('Unable to find Student with ID "%1"', $id));
//        }
//        return $Student;
//    }

    /**
     * @param \Vnext\BasicTraining\Api\Data\StudentInterface $Student
     * @return \Vnext\BasicTraining\Api\Data\StudentInterface
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function save(StudentInterface $Student)
    {
        $this->studentResource->save($Student);
        return $Student;
    }

    /**
     * @param \Vnext\BasicTraining\Api\Data\StudentInterface $Student
     * @return bool true on success
     * @throws \Magento\Framework\Exception\CouldNotDeleteException
     */
    public function delete(StudentInterface $Student)
    {
        try {
            $this->studentResource->delete($Student);
        } catch (\Exception $exception) {
            throw new CouldNotDeleteException(
                __('Could not delete the entry: %1', $exception->getMessage())
            );
        }

        return true;

    }

    /**
     * @param \Magento\Framework\Api\SearchCriteriaInterface $searchCriteria
     * @return \Vnext\BasicTraining\Api\Data\StudentSearchResultInterface
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function getList(SearchCriteriaInterface $searchCriteria)
    {
        $collection = $this->studentCollectionFactory->create();
        // foreach ($filter as $key=>$item){
        //     $collection->addFieldToFilter($key, $item);
        // }
        $this->collectionProcessor->process($searchCriteria, $collection);
        $searchResults = $this->searchResultFactory->create();

        $searchResults->setSearchCriteria($searchCriteria);
        $searchResults->setItems($collection->getItems());

        return $searchResults;
    }

    /**
     * @param int $id
     * @return \Vnext\BasicTraining\Api\Data\StudentInterface
     * @throws \Magento\Framework\Exception\NoSuchEntityException
     */
    public function getStudentById($id)
    {
        $Student = $this->studentFactory->create();
        $this->studentResource->load($Student, $id);
        if (!$Student->getId()) {
            throw new NoSuchEntityException(__('Unable to find Student with ID "%1"', $id));
        }
        return $Student;
    }

    /**
     * @param int $id
     * @return string
     * @throws \Magento\Framework\Exception\NoSuchEntityException
     */
    public function deleteById($id)
    {
        $Student = $this->studentFactory->create();
        $Student->load($id);
        $Student->delete();
        return "Đã xóa thành công";
    }

    /**
     * @param \Vnext\BasicTraining\Api\Data\StudentInterface $Student
     * @return array
     */
    public function createStudent()
    {
        $data = $this->request->getParams();
        $insertData = $this->studentFactory->create();
        $insertData->setName($data['name']);
        $insertData->setGender($data['gender']);
        $insertData->setDob($data['dob']);
        $insertData->setAddress($data['address']);
        $insertData->setSlug($data['slug']);
        $insertData->setEmail($data['email']);
        try {
            $insertData->save();
            $response = ['success' => true, 'message' => '$data'];
        } catch (\Exception $error) {
            $response = ['success' => false, 'message' => $error->getMessage()];
        }
        return $response;
    }

    /**
     * @param \Vnext\BasicTraining\Api\Data\StudentInterface $Student
     * @return array
     */
//    public function updateStudent(StudentInterface $student){
//        $id = $student->getEntityId();
//        $query = $this->StudentFactory->create()->getCollection()->addFieldToFilter('entity_id', $id)->getFirstItem();
//        if($query->getData()){
//            $query->setData('name', $student->getName());
//            $query->setData('email', $student->getEmail());
//            $query->setData('address', $student->getAddress());
//            $query->setData('gender', $student->getGender());
//            $query->setData('slug', $student->getSlug());
//            $query->save();
//        }
//        return $query;
//
//    }
    public function updateStudent($id){

        $data = $this->request->getParams();
        var_dump($this->request->getParam('name'));
        die();
        $insertData =  $this->studentFactory->create()->load($id);
        $insertData->setName($json['name']);
        $insertData->setGender($json['gender']);
        $insertData->setDob($json['dob']);
        $insertData->setAddress($json['address']);
        $insertData->setSlug($json['slug']);
        $insertData->setEmail($json['email']);
        try {
            $insertData->save();
            $response = ['success' => true, 'message' => '$data'];
        } catch (\Exception $error) {
            $response = ['success' => false, 'message' => $error->getMessage()];
        }
        return $response;
    }
}
