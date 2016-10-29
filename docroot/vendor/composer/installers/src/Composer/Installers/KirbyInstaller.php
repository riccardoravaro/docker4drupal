<?php
namespace Composer\Installers;

class KirbyInstaller extends BaseInstaller
{
    protected $locations = array(
        'plugin'    => 'site/plugins/{$name}/',
<<<<<<< HEAD
=======
        'field'    => 'site/fields/{$name}/',
        'tag'    => 'site/tags/{$name}/'
>>>>>>> ea75da0d6d82e55b23a2a2f5ed629e3b52ee75d9
    );
}
