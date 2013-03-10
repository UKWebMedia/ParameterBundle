<?php
/**
 * Created by JetBrains PhpStorm.
 * User: mv
 * Date: 03/03/13
 * Time: 20:28
 * To change this template use File | Settings | File Templates.
 */

namespace Cannibal\Bundle\ParameterBundle\Parameter;

use Cannibal\Bundle\ParameterBundle\Parameter\Factory\ParameterCollectionFactory;
use Cannibal\Bundle\ParameterBundle\Parameter\ParameterCollection;

class Binder
{
    private $boundParamFactory;

    public function __construct(ParameterCollectionFactory $boundParamFactory)
    {
        $this->boundParamFactory = $boundParamFactory;
    }

    /**
     * @return \Cannibal\Bundle\ParameterBundle\Parameter\Factory\ParameterCollectionFactory
     */
    public function getParamFactory()
    {
        return $this->boundParamFactory;
    }

    /**
     * @param \Cannibal\Bundle\ParameterBundle\Parameter\ParameterCollection $expected
     * @param array $data
     * @return \Cannibal\Bundle\ParameterBundle\Parameter\ParameterCollectionInterface Unbound Parameters
     */
    public function bind(ParameterCollection $all, array $data)
    {
        $factory = $this->getParamFactory();
        $out = $factory->createParameterCollection('unbound');

        foreach($data as $key => $value){

            if($all->hasParameter($key)){
                $param = $all->getParameter($key);
            }
            else{
                $unbound = $factory->createUnboundParameter();
                $unbound->setName($key);
                $unbound->setValue($value);
                $out->addParameter($unbound);
            }
        }

        return $out;
    }
}