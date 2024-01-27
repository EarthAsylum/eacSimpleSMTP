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
 * included for admin_options_settings() method
 * @version 23.1031.1
 */

defined( 'ABSPATH' ) or exit;

$this->registerExtensionOptions( $this->className,
	[
		'smtp_server'			=> array(
						'type'		=>	'text',
						'label'		=>	'SMTP Server Name',
						'default'	=>	$this->get_network_option('smtp_server'),
						'info'		=>	'The outgoing mail server name.'
					),
		'smtp_port'				=> array(
						'type'		=>	'radio',
						'label'		=>	'SMTP Port',
						'options'	=>	['25','465','587'],
						'default'	=>	$this->get_network_option('smtp_port') ?: '587',
						'info'		=>	'The mail server port to use.<br/>'.
										'Typically, port 25 = no encryption, port 465 = SSL encryption, port 587 = TLS encryption.',
					),
		'smtp_encryption'		=> array(
						'type'		=>	'radio',
						'label'		=>	'SMTP Encryption',
						'options'	=>	['none','SSL','TLS'],
						'default'	=> 	$this->get_network_option('smtp_encryption') ?: 'TLS',
						'info'		=>	'Does your mail server use encryption?',
					),
		'smtp_username'			=> array(
						'type'		=>	'text',
						'label'		=>	'SMTP User Name',
						'default'	=>	$this->get_network_option_decrypt('smtp_username'),
						'info'		=>	'The email address/username used to authenticate with your mail server.<br/>'.
										'<small>(encrypted when stored)</small>',
						'encrypt'	=> 	true,
						'attributes'=> ['autocomplete'=>'new-password'],
					),
		'smtp_password'			=> array(
						'type'		=>	'password',
						'label'		=>	'SMTP Password',
						'default'	=>	$this->get_network_option_decrypt('smtp_password'),
						'info'		=>	'The password used to authenticate with your mail server.<br/>'.
										'<small>(encrypted when stored)</small>',
						'encrypt'	=> 	true,
						'attributes'=> ['autocomplete'=>'new-password'],
					),
		'smtp_fromname'			=> array(
						'type'		=>	'text',
						'label'		=>	'Send From Name',
						'info'		=>	'The default name used when sending email.',
						'attributes'=> ['autocomplete'=>'off'],
					),
		'smtp_fromemail'		=> array(
						'type'		=>	'email',
						'label'		=>	'Send From Email',
						'info'		=>	'The default email address used when sending email.',
						'attributes'=> ['autocomplete'=>'off'],
					),
		'smtp_override'			=> array(
						'type'		=>	'checkbox',
						'label'		=>	'Override Senders',
						'options'	=>	['Enabled'],
						'info'		=>	'Always send from above name/address (overriding other scripts).'
					),
		'smtp_headers'			=> array(
						'type'		=>	'textarea',
						'label'		=>	'Default Headers',
						'default'	=>	$this->get_network_option('smtp_headers'),
						'info'		=>	'Add custom headers to all outgoing emails. One per line as: header-name: header-value'
					),
		'smtp_debug'			=> array(
						'type'		=>	'radio',
						'label'		=>	'SMTP Debugging',
						'options'	=>	[
											['Off'									=> 0,],
											['Only client -> server messages'		=> 1,],
											['Include server -> client messages'	=> 2,],
											['Include connection messages'			=> 3,],
											['Log all messages'						=> 4,],
										],
						'info'		=>	'Capture &amp; log SMTP messages.',
						'style'		=> 'display:block;'
					),
		'_smtp_testemail'		=> array(
						'type'		=>	'text',
						'label'		=>	'Send a Test',
						'info'		=>	'Send a test email to this address to ensure your configuration is working.'
					),
	]
);

// when our submit buttons post
$this->add_filter( 'options_form_post__smtp_testemail',		array($this, 'send_test_email'), 10, 4 );
