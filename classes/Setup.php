<?php

class PluginBaseBoilerplateSetup
{
    /** @var PluginBaseBoilerplateDependencyChecker */
    private $dependencyChecker;

    public function init()
    {
        $this->loadClasses();
        $this->createInstances();

        try {
            $this->dependencyChecker->check();
        } catch (PluginBaseBoilerplateMissingDependenciesException $e) {
            $this->reportMissingDependencies($e->getMissingPluginNames());
            return;
        }
    }

    private function loadClasses()
    {
        // Exceptions
        require_once dirname(__FILE__) . '/exceptions/Exception.php';
        require_once dirname(__FILE__) . '/exceptions/MissingDependenciesException.php';

        // Dependency checker
        require_once dirname(__FILE__) . '/DependencyChecker.php';
        require_once dirname(__FILE__) . '/MissingDependencyReporter.php';
    }

    private function createInstances()
    {
        $this->dependencyChecker = new PluginBaseBoilerplateDependencyChecker();
    }

    /**
     * @param string[] $missingPluginNames
     */
    private function reportMissingDependencies($missingPluginNames)
    {
        $missingDependencyReporter = new PluginBaseBoilerplateMissingDependencyReporter($missingPluginNames);
        $missingDependencyReporter->showErrors();
    }
}
