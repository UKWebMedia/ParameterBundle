<?php
namespace Cannibal\Bundle\ParameterBundle\Parameter;

use Cannibal\Bundle\ParameterBundle\Annotation\Parameter\ParameterInterface;

interface ParameterCollectionInterface
{
    public function getName();
    public function getParameters();
    public function hasParameter($name);
    public function getParameter($name);
    public function addParameter(ParameterInterface $param);
}