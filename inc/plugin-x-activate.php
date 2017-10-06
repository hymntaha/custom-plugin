<?php
/**
 * @package  plugin-x
 */

class PluginXActivate
{
	public static function activate() {
		flush_rewrite_rules();
	}
}