<?php
namespace Composer\Installers;

class AsgardInstaller extends BaseInstaller
{
    protected $locations = array(
        'module' => 'Modules/{$name}/',
        'theme' => 'Themes/{$name}/'
    );

    /**
     * Format package name.
     *
     * For package type asgard-module, cut off a trailing '-plugin' if present.
     *
     * For package type asgard-theme, cut off a trailing '-theme' if present.
     *
     */
    public function inflectPackageVars($vars)
    {
        if ($vars['type'] === 'asgard-module') {
            return $this->inflectPluginVars($vars);
        }

        if ($vars['type'] === 'asgard-theme') {
            return $this->inflectThemeVars($vars);
        }

        return $vars;
    }

    protected function inflectPluginVars($vars)
    {
<<<<<<< HEAD
        $vars['name'] = ucfirst(preg_replace('/-module/', '', $vars['name']));
=======
        $vars['name'] = preg_replace('/-module$/', '', $vars['name']);
        $vars['name'] = str_replace(array('-', '_'), ' ', $vars['name']);
        $vars['name'] = str_replace(' ', '', ucwords($vars['name']));
>>>>>>> ea75da0d6d82e55b23a2a2f5ed629e3b52ee75d9

        return $vars;
    }

    protected function inflectThemeVars($vars)
    {
<<<<<<< HEAD
        $vars['name'] = ucfirst(preg_replace('/-theme$/', '', $vars['name']));
=======
        $vars['name'] = preg_replace('/-theme$/', '', $vars['name']);
        $vars['name'] = str_replace(array('-', '_'), ' ', $vars['name']);
        $vars['name'] = str_replace(' ', '', ucwords($vars['name']));
>>>>>>> ea75da0d6d82e55b23a2a2f5ed629e3b52ee75d9

        return $vars;
    }
}
