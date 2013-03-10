<?php
/**
 * Created by JetBrains PhpStorm.
 * User: mv
 * Date: 03/03/13
 * Time: 13:43
 * To change this template use File | Settings | File Templates.
 */

namespace Cannibal\Bundle\ParameterBundle\Annotation\Processor;

use Cannibal\Bundle\ParameterBundle\Parameter\ParameterCollection;
use Cannibal\Bundle\ParameterBundle\Annotation\Parameter\ParameterInterface;

class ExpectedParameterProcessor
{
    public function extractParameterAnnotations(array $methodAnnotations)
    {
        $parameters = new ParameterCollection('all');
        foreach($methodAnnotations as $annotation){
            if($annotation instanceof ParameterInterface){
                $parameters->addParameter($annotation);
            }
        }

        return $parameters;
    }
}