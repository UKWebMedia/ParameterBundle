<?php
/**
 * Created by JetBrains PhpStorm.
 * User: mv
 * Date: 02/03/13
 * Time: 23:03
 * To change this template use File | Settings | File Templates.
 */

namespace Cannibal\Bundle\ParameterBundle\Parameter\EventListener;
use Symfony\Component\HttpKernel\Event\FilterControllerEvent;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\HttpKernel\HttpKernelInterface;
use Doctrine\Common\Annotations\Reader;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ConfigurationInterface;
use Doctrine\Common\Util\ClassUtils;
use Symfony\Component\HttpKernel\KernelEvents;
use Cannibal\Bundle\ParameterBundle\Annotation\Parameter\ParameterInterface;
use Cannibal\Bundle\ParameterBundle\Annotation\Processor\ParameterProcessor;
use Cannibal\Bundle\ParameterBundle\Parameter\CollectionManager;

class RequestListener implements EventSubscriberInterface
{
    /**
     * @var \Doctrine\Common\Annotations\Reader
     */
    private $reader;
    private $processor;
    private $manager;

    /**
     * Constructor.
     *
     * @param Reader $reader An Reader instance
     */
    public function __construct(Reader $reader, ParameterProcessor $expectedProcessor, CollectionManager $manager)
    {
        $this->reader = $reader;
        $this->processor = $expectedProcessor;
        $this->manager = $manager;
    }

    public function setExpectedParameterManager($manager)
    {
        $this->manager = $manager;
    }

    /**
     * @return \Cannibal\Bundle\ParameterBundle\Parameter\CollectionManager
     */
    public function getExpectedParameterManager()
    {
        return $this->manager;
    }

    public function setProcessor(ParameterProcessor $processor)
    {
        $this->processor = $processor;
    }

    public function getProcessor()
    {
        return $this->processor;
    }

    /**
     * @param \Doctrine\Common\Annotations\Reader $reader
     */
    public function setReader($reader)
    {
        $this->reader = $reader;
    }

    /**
     * @return \Doctrine\Common\Annotations\Reader
     */
    public function getReader()
    {
        return $this->reader;
    }

    /**
     * Modifies the Request object to apply configuration information found in
     * controllers annotations like the template to render or HTTP caching
     * configuration.
     *
     * @param FilterControllerEvent $event A FilterControllerEvent instance
     */
    public function onKernelController(FilterControllerEvent $event)
    {
        if (!is_array($controller = $event->getController())) {
            return;
        }

        $className = get_class($controller[0]);
        $object = new \ReflectionClass($className);
        $method = $object->getMethod($controller[1]);

        $annotations = $this->reader->getMethodAnnotations($method);

        $expected = $this->getProcessor()->extractParameterAnnotations($annotations);

        $event->getRequest()->attributes->set('parameter_annotations', $expected);

        $this->getExpectedParameterManager()->setCollections($expected);
    }

    /**
     * Returns an array of event names this subscriber wants to listen to.
     *
     * The array keys are event names and the value can be:
     *
     *  * The method name to call (priority defaults to 0)
     *  * An array composed of the method name to call and the priority
     *  * An array of arrays composed of the method names to call and respective
     *    priorities, or 0 if unset
     *
     * For instance:
     *
     *  * array('eventName' => 'methodName')
     *  * array('eventName' => array('methodName', $priority))
     *  * array('eventName' => array(array('methodName1', $priority), array('methodName2'))
     *
     * @return array The event names to listen to
     *
     * @api
     */
    public static function getSubscribedEvents()
    {
        return array(KernelEvents::CONTROLLER=>'onKernelController');
    }
}
