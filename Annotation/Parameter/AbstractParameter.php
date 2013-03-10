<?php
namespace Cannibal\Bundle\ParameterBundle\Annotation\ExpectedParameter;

use Cannibal\Bundle\ParameterBundle\Annotation\Parameter\ParameterInterface;
use Cannibal\Bundle\ParameterBundle\Parameter\ParameterCollection;

abstract class AbstractParameter implements ParameterInterface
{
    private $name;
    private $options;
    private $collection;
    private $priority;

    private $value;

    public function __construct(ParameterCollection $collection)
    {
        $this->name = null;
        $this->options = array();
        $this->collection = null;
        $this->priority = 0;

        $this->value = null;
    }

    public function setName($name)
    {
        $this->name = $name;
    }

    public function getName()
    {
        return $this->name;
    }

    public function setOptions(array $options)
    {
        $this->options = $options;
    }

    public function getOptions()
    {
        return $this->options;
    }

    public function setCollection($collection)
    {
        $this->collection = $collection;
    }

    public function getCollection()
    {
        return $this->collection;
    }

    public function setPriority($priority)
    {
        $this->priority = $priority;
    }

    public function getPriority()
    {
        return $this->priority;
    }

    public function setValue($value)
    {
        $this->value = $value;
    }

    public function getValue()
    {
        return $this->value;
    }

    /**
     * @return array
     */
    abstract public function getCollectionNames();
}