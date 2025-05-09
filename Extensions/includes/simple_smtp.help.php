<?php
/**
 * Extension: simple_smtp - Configure phpmailer using SMTP server
 *
 * @category	WordPress Plugin
 * @package		{eac}Doojigger\Extensions
 * @author		Kevin Burkholder <KBurkholder@EarthAsylum.com>
 * @copyright	Copyright (c) 2025 EarthAsylum Consulting <www.EarthAsylum.com>
 *
 * included for admin_options_help() method
 * @version 25.0429.1
 */

defined( 'ABSPATH' ) or exit;

ob_start();
?>
	<p>The {eac}SimpleSMTP extension adds SMTP server configuration for WordPress so that all
	email sent from your WordPress site will be sent through your SMTP (outgoing) mail server.</p>

	<details><summary>Available Filters:</summary>
	<ul>
		<li><code>simpleSMTP_from_name</code> get the email from name used by SimpleSMTP
		<li><code>simpleSMTP_from_email</code> get the email from address used by SimpleSMTP
	</li>
	</details>
<?php
$content = ob_get_clean();

$this->addPluginHelpTab(['Simple SMTP',self::TAB_NAME],$content,['Simple SMTP','open']);

$this->addPluginSidebarLink(
	"<span class='dashicons dashicons-email'></span>{eac}SimpleSMTP",
	"https://eacdoojigger.earthasylum.com/eacsimplesmtp/",
	"{eac}SimpleSMTP Extension Plugin"
);
