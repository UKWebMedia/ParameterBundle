<?php
namespace Cannibal\Bundle\ParameterBundle\Annotation\Parameter;

interface ParameterInterface
{
    /**
     * @return string
     */
    public function getName();

    /**
     * @return array
     */
    public function getOptions();

    /**
     * @return int
     */
    public function getPriority();

    /**
     * @return mixed
     */
    public function getValue();

    /**
     * @return array
     */
    public function getCollectionNames();
}