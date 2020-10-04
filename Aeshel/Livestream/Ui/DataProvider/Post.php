<?php
namespace Aeshel\Livestream\Ui\DataProvider;

use Magento\Framework\Api\FilterBuilder;
use Magento\Framework\Api\Search\ReportingInterface;
use Magento\Framework\Api\Search\SearchCriteria;
use Magento\Framework\Api\Search\SearchCriteriaBuilder;
use Magento\Framework\Api\Search\SearchResultInterface;
use Magento\Framework\App\RequestInterface;
use Aeshel\Livestream\Model\ResourceModel\Post\CollectionFactory as LivestreamCollection;

class Post extends \Magento\Ui\DataProvider\AbstractDataProvider
{

    protected $name;

    protected $primaryFieldName;

    protected $requestFieldName;

    protected $meta = [];

    protected $data = [];

    protected $reporting;

    protected $filterBuilder;

    protected $searchCriteriaBuilder;

    protected $request;

    protected $searchCriteria;

    protected $liveStreamCollection;
    protected $loadedData;

    public function __construct(
        $name,
        $primaryFieldName,
        $requestFieldName,
        ReportingInterface $reporting,
        SearchCriteriaBuilder $searchCriteriaBuilder,
        RequestInterface $request,
        FilterBuilder $filterBuilder,
        LivestreamCollection $liveStreamCollection,
        array $meta = [],
        array $data = []
    ) {
        $this->request = $request;
        $this->filterBuilder = $filterBuilder;
        $this->name = $name;
        $this->primaryFieldName = $primaryFieldName;
        $this->requestFieldName = $requestFieldName;
        $this->reporting = $reporting;
        $this->searchCriteriaBuilder = $searchCriteriaBuilder;
        $this->meta = $meta;
        $this->data = $data;
        $this->collection = $liveStreamCollection->create();
        
        parent::__construct($name,$primaryFieldName,$requestFieldName,$meta,$data);
        // return $this->collection;
    }

    public function getData()
    {
        if (isset($this->loadedData)) {
            $this->loadedData['name'] = ['secret key'];
            return $this->loadedData;
        }
        $items = $this->collection->getItems();
        foreach ($items as $value) {
            $this->loadedData[$value->getId()] = $value->getData();
        }
        return $this->loadedData;
    }
}