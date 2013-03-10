<?php
namespace Cannibal\Bundle\ParameterBundle\Parameter;

use Cannibal\Bundle\ParameterBundle\Annotation\Parameter\ParameterInterface;

class UnboundParameter implements ParameterInterface
{
    private $name;
    private $value;

    public function __construct()
    {
        $this->name = null;
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
    public function getOptions()
    {
        return array();
    }

    /**
     * @return int
     */
    public function getPriority()
    {
        return 0;
    }

    /**
     * @return array
     */
    public function getCollectionNames()
    {
        return array('unbound');
    }
}