<?php
namespace Cannibal\Bundle\ParameterBundle\Parameter;

use Doctrine\Common\Collections\ArrayCollection;
use Cannibal\Bundle\ParameterBundle\Parameter\UnboundParameter;
use Cannibal\Bundle\ParameterBundle\Annotation\Parameter\ParameterInterface;

use Cannibal\Bundle\ParameterBundle\Parameter\ParameterCollectionInterface;

class ParameterCollection implements ParameterCollectionInterface
{
    private $name;
    private $parameters;

    public function __construct($name)
    {
        $this->name = $name;
        $this->parameters = new ArrayCollection();
    }

    public function hasParameter($name)
    {
        /** @var ParameterInterface $parameter */
        foreach($this->getParameters() as $parameter){
            if($parameter->getName() == $name){
                return true;
            }
        }

        return false;
    }

    public function getParameter($name)
    {
        /** @var ParameterInterface $parameter */
        foreach($this->getParameters() as $parameter){
            if($parameter->getName() == $name){
                return $parameter;
            }
        }

        return null;
    }

    public function setParameters($parameters)
    {
        $this->parameters = $parameters;
    }

    public function addParameter(ParameterInterface $param)
    {
        $this->getParameters()->add($param);
    }

    /**
     * @return \Doctrine\Common\Collections\ArrayCollection
     */
    public function getParameters()
    {
        return $this->parameters;
    }

    public function getName()
    {
        return $this->name;
    }
}