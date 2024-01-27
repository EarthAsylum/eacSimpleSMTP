<?php
/**
 * Extension: simple_smtp - Configure phpmailer using SMTP server
 *
 * @category	WordPress Plugin
 * @package		{eac}Doojigger\Extensions
 * @author		Kevin Burkholder <KBurkholder@EarthAsylum.com>
 * @copyright	Copyright (c) 2022 EarthAsylum Consulting <www.EarthAsylum.com>
 * @version		1.x
 *
 * included for send_test_email() method
 * @version 23.1031.1
 */

defined( 'ABSPATH' ) or exit;

return "
	<!DOCTYPE html>
	<head>
		<style type='text/css' media='all'>
			* {font-family: Verdana, Helvetica, Tahoma, sans-serif; font-size: 14px;}
			#content {
				text-align: center;
				max-width: 80%;
				margin: 5em auto;
				position: relative;
				padding: 20px 5px;
				border-radius: 4px;
				border: 1px solid #ccc;
				border-left: 10px solid #358ccb;
				border-right: 10px solid #358ccb;
			}
			footer * {font-size: 10px; font-weight: 100;}
		</style>
	</head>
	<body>
		<div id='content'>
			<h3>Congratulations!</h3>
			<h4>Your test email from '".\get_option('blogname')."' was successfully delivered.</h4>
			<p>Your message was sent from <em>".$this->get_option('smtp_fromname')." &lt;".$this->get_option('smtp_fromemail')."&gt;</em>
				<br/>to <em>".$testEmail."</em></p>
			<p> Your mail configuration appears to be working correctly.</p>
		</div>
		<footer>
			<p>".$this->pluginName." - ".$this->className."<br/>
			<a href='".$this->plugin->getPluginValue('AuthorURI')."'/>".$this->plugin->getPluginValue('Author')."</a></p>
		<footer>
	</body>
	</html>
";
