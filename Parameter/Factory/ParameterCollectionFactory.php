<?php
/**
 * Created by JetBrains PhpStorm.
 * User: mv
 * Date: 03/03/13
 * Time: 20:22
 * To change this template use File | Settings | File Templates.
 */

namespace Cannibal\Bundle\ParameterBundle\Parameter\Factory;

use Cannibal\Bundle\ParameterBundle\Parameter\UnboundParameter;
use Cannibal\Bundle\ParameterBundle\Parameter\ParameterCollection;

class ParameterCollectionFactory
{
    public function createParameterCollection($name)
    {
        return new ParameterCollection($name);
    }

    public function createUnboundParameter()
    {
        return new UnboundParameter();
    }
}