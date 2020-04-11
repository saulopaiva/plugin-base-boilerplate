<?php
// agillitas-api-dollar-tax/classes/MissingDependencyReporter.php
class PluginBaseBoilerplateMissingDependencyReporter
{
    const REQUIRED_CAPABILITY = 'activate_plugins';

    /** @var string[] */
    private $missingPluginNames;

    /**
     * @param string[] $missingPluginNames
     */
    public function __construct($missingPluginNames)
    {
        $this->missingPluginNames = $missingPluginNames;
    }

    public function showErrors()
    {
        wp_die($this->errorMessage());
    }

    public function errorMessage()
    {
        if (!current_user_can(self::REQUIRED_CAPABILITY)) {
            // If the user does not have the "activate_plugins" capability, do nothing.
            return;
        }

        $errors = esc_html(implode(', ', $this->missingPluginNames));
        $message = "
        <p>
            <strong>Error:</strong>
            The plugin won't execute
            because the following required plugins are not active:<br>
            $errors.<br>
            Please activate these plugins.
        </p>";

        return $message;
    }
}
