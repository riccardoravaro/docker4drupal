<?php
namespace Composer\Installers;

class DrupalInstaller extends BaseInstaller
{
    protected $locations = array(
        'core'      => 'core/',
        'module'    => 'modules/{$name}/',
        'theme'     => 'themes/{$name}/',
        'library'   => 'libraries/{$name}/',
        'profile'   => 'profiles/{$name}/',
        'drush'     => 'drush/{$name}/',
<<<<<<< HEAD
=======
	    'custom-theme' => 'themes/custom/{$name}/',
	    'custom-module' => 'modules/custom/{$name}',
>>>>>>> ea75da0d6d82e55b23a2a2f5ed629e3b52ee75d9
    );
}
