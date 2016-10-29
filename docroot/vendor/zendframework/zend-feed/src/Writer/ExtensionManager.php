<?php
/**
 * Zend Framework (http://framework.zend.com/)
 *
 * @link      http://github.com/zendframework/zf2 for the canonical source repository
 * @copyright Copyright (c) 2005-2015 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

namespace Zend\Feed\Writer;

/**
 * Default implementation of ExtensionManagerInterface
 *
<<<<<<< HEAD
 * Decorator of ExtensionPluginManager.
=======
 * Decorator for an ExtensionManagerInstance.
>>>>>>> ea75da0d6d82e55b23a2a2f5ed629e3b52ee75d9
 */
class ExtensionManager implements ExtensionManagerInterface
{
    protected $pluginManager;

    /**
     * Constructor
     *
     * Seeds the extension manager with a plugin manager; if none provided,
<<<<<<< HEAD
     * creates an instance.
     *
     * @param  null|ExtensionPluginManager $pluginManager
     */
    public function __construct(ExtensionPluginManager $pluginManager = null)
    {
        if (null === $pluginManager) {
            $pluginManager = new ExtensionPluginManager();
=======
     * creates and decorates an instance of StandaloneExtensionManager.
     *
     * @param  null|ExtensionManagerInterface $pluginManager
     */
    public function __construct(ExtensionManagerInterface $pluginManager = null)
    {
        if (null === $pluginManager) {
            $pluginManager = new StandaloneExtensionManager();
>>>>>>> ea75da0d6d82e55b23a2a2f5ed629e3b52ee75d9
        }
        $this->pluginManager = $pluginManager;
    }

    /**
     * Method overloading
     *
<<<<<<< HEAD
     * Proxy to composed ExtensionPluginManager instance.
=======
     * Proxy to composed ExtensionManagerInterface instance.
>>>>>>> ea75da0d6d82e55b23a2a2f5ed629e3b52ee75d9
     *
     * @param  string $method
     * @param  array $args
     * @return mixed
     * @throws Exception\BadMethodCallException
     */
    public function __call($method, $args)
    {
        if (!method_exists($this->pluginManager, $method)) {
            throw new Exception\BadMethodCallException(sprintf(
                'Method by name of %s does not exist in %s',
                $method,
                __CLASS__
            ));
        }
        return call_user_func_array([$this->pluginManager, $method], $args);
    }

    /**
     * Get the named extension
     *
     * @param  string $name
     * @return Extension\AbstractRenderer
     */
    public function get($name)
    {
        return $this->pluginManager->get($name);
    }

    /**
     * Do we have the named extension?
     *
     * @param  string $name
     * @return bool
     */
    public function has($name)
    {
        return $this->pluginManager->has($name);
    }
}
