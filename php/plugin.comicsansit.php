<?php

/**
 * Comic Sans Plugin
 *
 * Make WebApp pretty!
 */
class Plugincomicsansit extends Plugin {

	/**
	 * Constructor
	 */
	function __construct() {}

	/**
	 * Function initializes the Plugin and registers all hooks
	 *
	 * @return void
	 */
	function init() {
		$this->registerHook('server.core.settings.init.before');
	}

	/**
	 * Function is executed when a hook is triggered by the PluginManager
	 *
	 * @param string $eventID the id of the triggered hook
	 * @param mixed $data object(s) related to the hook
	 * @return void
	 */
	function execute($eventID, &$data) {
		switch($eventID) {
			case 'server.core.settings.init.before' :
				$this->injectPluginSettings($data);
				break;
		}
	}

	/**
	 * Called when the core Settings class is initialized and ready to accept sysadmin default
	 * settings. Registers the URL for the comic sans plugin into the settings.
	 * @param Array $data Reference to the data of the triggered hook
	 */
	function injectPluginSettings(&$data) {
		$data['settingsObj']->addSysAdminDefaults(Array(
			'zarafa' => Array(
				'v1' => Array(
					'plugins' => Array(
						'comicsansit' => Array(
							'enable' => PLUGIN_COMICSANSIT_USER_DEFAULT_ENABLE
						)
					)
				)
			)
		));
	}
}
?>
