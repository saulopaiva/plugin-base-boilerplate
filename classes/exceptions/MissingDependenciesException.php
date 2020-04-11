<?php

class PluginBaseBoilerplateMissingDependenciesException extends PluginBaseBoilerplateException
{
    /** @var string[] */
    private $missingPluginNames;

    /**
     * @param string[] $missingPluginNames Names of the plugins that our plugin depends on,
     *                                       that were found to be inactive.
     */
    public function __construct($missingPluginNames)
    {
        $this->missingPluginNames = $missingPluginNames;
    }

    /**
     * @return string[]
     */
    public function getMissingPluginNames()
    {
        return $this->missingPluginNames;
    }
}
