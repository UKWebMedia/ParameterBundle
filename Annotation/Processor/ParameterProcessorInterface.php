<?php
namespace Cannibal\Bundle\ParameterBundle\Annotation\Processor;


interface ParameterProcessorInterface
{
    /**
     * @param array $methodAnnotations
     * @return \Cannibal\Bundle\ParameterBundle\Parameter\ParameterCollectionInterface
     */
    public function extractParameterAnnotations(array $methodAnnotations);
}