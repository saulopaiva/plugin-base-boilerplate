<?php

class PluginBaseBoilerplateDependencyChecker
{
    /**
     * Define the plugins that our plugin requires to function.
     * Array format: 'Plugin Name' => 'Path to main plugin file'
     */
    const REQUIRED_PLUGINS = array(
        // ADD DEPENDENCIES HERE
        // 'ACF' => 'advanced-custom-fields-pro/acf.php',
    );

    /**
     * Check if all required plugins are active, otherwise throw an exception.
     *
     * @throws PluginBaseBoilerplateMissingDependenciesException
     */
    public function check()
    {
        $missingPlugins = $this->getMissingPluginsList();
        if (!empty($missingPlugins)) {
            throw new PluginBaseBoilerplateMissingDependenciesException($missingPlugins);
        }
    }

    /**
     * @return string[] Names of plugins that we require, but that are inactive.
     */
    private function getMissingPluginsList()
    {
        $missingPlugins = array();
        foreach (self::REQUIRED_PLUGINS as $plugin_name => $mainFilePath) {
            if (!$this->isPluginActive($mainFilePath)) {
                $missingPlugins[] = $plugin_name;
            }
        }
        return $missingPlugins;
    }

    /**
     * @param string $mainFilePath Path to main plugin file, as defined in self::REQUIRED_PLUGINS.
     *
     * @return bool
     */
    private function isPluginActive($mainFilePath)
    {
        return in_array($mainFilePath, $this->getActivePlugins());
    }

    /**
     * @return string[] Returns an array of active plugins' main files.
     */
    private function getActivePlugins()
    {
        return apply_filters('active_plugins', get_option('active_plugins'));
    }
}
