<?php
namespace Cannibal\Bundle\ParameterBundle\Parameter;

use Cannibal\Bundle\ParameterBundle\Parameter\ParameterCollection;

class CollectionManager
{
    private $collections;

    public function __construct()
    {
        $this->collections = array();
    }

    public function setCollections(array $collections)
    {
        $this->collections = $collections;
    }

    /**
     * @return array
     */
    public function getCollections()
    {
        return $this->collections;
    }

    public function addCollection(ParameterCollection $collection)
    {
        $this->collections[$collection->getName()] = $collection;
    }
}