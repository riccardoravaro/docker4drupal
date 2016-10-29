<?php
namespace Composer\Installers;

/**
 * Extension installer for TYPO3 CMS
 *
<<<<<<< HEAD
=======
 * @deprecated since 1.0.25, use https://packagist.org/packages/typo3/cms-composer-installers instead
 *
>>>>>>> ea75da0d6d82e55b23a2a2f5ed629e3b52ee75d9
 * @author Sascha Egerer <sascha.egerer@dkd.de>
 */
class TYPO3CmsInstaller extends BaseInstaller
{
    protected $locations = array(
        'extension'   => 'typo3conf/ext/{$name}/',
    );
}
