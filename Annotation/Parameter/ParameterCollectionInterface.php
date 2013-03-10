<?php
/**
 * Created by JetBrains PhpStorm.
 * User: mv
 * Date: 03/03/13
 * Time: 22:00
 * To change this template use File | Settings | File Templates.
 */

namespace Cannibal\Bundle\ParameterBundle\Annotation\Parameter;

use Cannibal\Bundle\ParameterBundle\Annotation\Parameter\ParameterInterface;


interface ParameterCollectionInterface
{
    public function getName();

    public function hasParameter($name);

    /**
     * @param $name
     * @return \Cannibal\Bundle\ParameterBundle\Annotation\Parameter\ParameterInterface
     */
    public function getParameter($name);

    public function addParameter(ParameterInterface $param);

    public function getParameters();
}