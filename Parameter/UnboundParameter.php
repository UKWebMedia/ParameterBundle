<?php
namespace Cannibal\Bundle\ParameterBundle\Parameter;

use Cannibal\Bundle\ParameterBundle\Annotation\ExpectedParameter\AbstractParameter;

class UnboundParameter extends AbstractParameter
{
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