<?php
namespace Composer\Installers\Test;

use Composer\Installers\AsgardInstaller;
use Composer\Package\Package;
use Composer\Composer;

class AsgardInstallerTest extends \PHPUnit_Framework_TestCase
{
    /**
<<<<<<< HEAD
     * @var OctoberInstaller
=======
     * @var AsgardInstaller
>>>>>>> ea75da0d6d82e55b23a2a2f5ed629e3b52ee75d9
     */
    private $installer;

    public function setUp()
    {
        $this->installer = new AsgardInstaller(
            new Package('NyanCat', '4.2', '4.2'),
            new Composer()
        );
    }

    /**
     * @dataProvider packageNameInflectionProvider
     */
    public function testInflectPackageVars($type, $name, $expected)
    {
        $this->assertEquals(
<<<<<<< HEAD
            $this->installer->inflectPackageVars(array('name' => $name, 'type' => $type)),
            array('name' => $expected, 'type' => $type)
=======
            array('name' => $expected, 'type' => $type),
            $this->installer->inflectPackageVars(array('name' => $name, 'type' => $type))
>>>>>>> ea75da0d6d82e55b23a2a2f5ed629e3b52ee75d9
        );
    }

    public function packageNameInflectionProvider()
    {
        return array(
<<<<<<< HEAD
=======
            // Should keep module name StudlyCase
            array(
                'asgard-module',
                'user-profile',
                'UserProfile'
            ),
>>>>>>> ea75da0d6d82e55b23a2a2f5ed629e3b52ee75d9
            array(
                'asgard-module',
                'asgard-module',
                'Asgard'
            ),
            array(
                'asgard-module',
                'blog',
                'Blog'
            ),
<<<<<<< HEAD
=======
            // tests that exactly one '-module' is cut off
            array(
                'asgard-module',
                'some-module-module',
                'SomeModule',
            ),
>>>>>>> ea75da0d6d82e55b23a2a2f5ed629e3b52ee75d9
            // tests that exactly one '-theme' is cut off
            array(
                'asgard-theme',
                'some-theme-theme',
<<<<<<< HEAD
                'Some-theme',
=======
                'SomeTheme',
>>>>>>> ea75da0d6d82e55b23a2a2f5ed629e3b52ee75d9
            ),
            // tests that names without '-theme' suffix stay valid
            array(
                'asgard-theme',
                'someothertheme',
                'Someothertheme',
            ),
<<<<<<< HEAD
=======
            // Should keep theme name StudlyCase
            array(
                'asgard-theme',
                'adminlte-advanced',
                'AdminlteAdvanced'
            ),
>>>>>>> ea75da0d6d82e55b23a2a2f5ed629e3b52ee75d9
        );
    }
}
