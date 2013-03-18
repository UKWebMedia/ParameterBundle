<?php
/**
 * Created by JetBrains PhpStorm.
 * User: mv
 * Date: 18/03/13
 * Time: 23:10
 * To change this template use File | Settings | File Templates.
 */

namespace Cannibal\Bundle\ParameterBundle\Parameter;


use Cannibal\Bundle\ParameterBundle\Parameter\ParameterCollectionInterface;

interface CollectionManagerInterface {

    public function setCollections(array $collections);

    /**
     * @return array
     */
    public function getCollections();

    public function addCollection(ParameterCollectionInterface $collection);
}