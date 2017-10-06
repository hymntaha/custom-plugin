<?php
/**
 * @package  plugin-x
 */

class PluginXDeactivate
{
	public static function deactivate() {
		flush_rewrite_rules();
	}
}