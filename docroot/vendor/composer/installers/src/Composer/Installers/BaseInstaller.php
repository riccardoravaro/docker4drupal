<?php
namespace Composer\Installers;

<<<<<<< HEAD
=======
use Composer\IO\IOInterface;
>>>>>>> ea75da0d6d82e55b23a2a2f5ed629e3b52ee75d9
use Composer\Composer;
use Composer\Package\PackageInterface;

abstract class BaseInstaller
{
    protected $locations = array();
    protected $composer;
    protected $package;
<<<<<<< HEAD
=======
    protected $io;
>>>>>>> ea75da0d6d82e55b23a2a2f5ed629e3b52ee75d9

    /**
     * Initializes base installer.
     *
     * @param PackageInterface $package
     * @param Composer         $composer
<<<<<<< HEAD
     */
    public function __construct(PackageInterface $package = null, Composer $composer = null)
    {
        $this->composer = $composer;
        $this->package = $package;
=======
     * @param IOInterface      $io
     */
    public function __construct(PackageInterface $package = null, Composer $composer = null, IOInterface $io = null)
    {
        $this->composer = $composer;
        $this->package = $package;
        $this->io = $io;
>>>>>>> ea75da0d6d82e55b23a2a2f5ed629e3b52ee75d9
    }

    /**
     * Return the install path based on package type.
     *
     * @param  PackageInterface $package
     * @param  string           $frameworkType
     * @return string
     */
    public function getInstallPath(PackageInterface $package, $frameworkType = '')
    {
        $type = $this->package->getType();

        $prettyName = $this->package->getPrettyName();
        if (strpos($prettyName, '/') !== false) {
            list($vendor, $name) = explode('/', $prettyName);
        } else {
            $vendor = '';
            $name = $prettyName;
        }

        $availableVars = $this->inflectPackageVars(compact('name', 'vendor', 'type'));

        $extra = $package->getExtra();
        if (!empty($extra['installer-name'])) {
            $availableVars['name'] = $extra['installer-name'];
        }

        if ($this->composer->getPackage()) {
            $extra = $this->composer->getPackage()->getExtra();
            if (!empty($extra['installer-paths'])) {
<<<<<<< HEAD
                $customPath = $this->mapCustomInstallPaths($extra['installer-paths'], $prettyName, $type);
=======
                $customPath = $this->mapCustomInstallPaths($extra['installer-paths'], $prettyName, $type, $vendor);
>>>>>>> ea75da0d6d82e55b23a2a2f5ed629e3b52ee75d9
                if ($customPath !== false) {
                    return $this->templatePath($customPath, $availableVars);
                }
            }
        }

        $packageType = substr($type, strlen($frameworkType) + 1);
        $locations = $this->getLocations();
        if (!isset($locations[$packageType])) {
            throw new \InvalidArgumentException(sprintf('Package type "%s" is not supported', $type));
        }

        return $this->templatePath($locations[$packageType], $availableVars);
    }

    /**
     * For an installer to override to modify the vars per installer.
     *
     * @param  array $vars
     * @return array
     */
    public function inflectPackageVars($vars)
    {
        return $vars;
    }

    /**
     * Gets the installer's locations
     *
     * @return array
     */
    public function getLocations()
    {
        return $this->locations;
    }

    /**
     * Replace vars in a path
     *
     * @param  string $path
     * @param  array  $vars
     * @return string
     */
    protected function templatePath($path, array $vars = array())
    {
        if (strpos($path, '{') !== false) {
            extract($vars);
            preg_match_all('@\{\$([A-Za-z0-9_]*)\}@i', $path, $matches);
            if (!empty($matches[1])) {
                foreach ($matches[1] as $var) {
                    $path = str_replace('{$' . $var . '}', $$var, $path);
                }
            }
        }

        return $path;
    }

    /**
     * Search through a passed paths array for a custom install path.
     *
     * @param  array  $paths
     * @param  string $name
     * @param  string $type
<<<<<<< HEAD
     * @return string
     */
    protected function mapCustomInstallPaths(array $paths, $name, $type)
    {
        foreach ($paths as $path => $names) {
            if (in_array($name, $names) || in_array('type:' . $type, $names)) {
=======
     * @param  string $vendor = NULL
     * @return string
     */
    protected function mapCustomInstallPaths(array $paths, $name, $type, $vendor = NULL)
    {
        foreach ($paths as $path => $names) {
            if (in_array($name, $names) || in_array('type:' . $type, $names) || in_array('vendor:' . $vendor, $names)) {
>>>>>>> ea75da0d6d82e55b23a2a2f5ed629e3b52ee75d9
                return $path;
            }
        }

        return false;
    }
}
