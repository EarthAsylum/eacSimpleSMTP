<?php
/**
 * Extension: simple_smtp - Configure phpmailer using SMTP server
 *
 * @category	WordPress Plugin
 * @package		{eac}Doojigger\Extensions
 * @author		Kevin Burkholder <KBurkholder@EarthAsylum.com>
 * @copyright	Copyright (c) 2026 EarthAsylum Consulting <www.EarthAsylum.com>
 *
 * included for admin_options_settings() method
 * @version 26.0827.1
 */

defined( 'ABSPATH' ) or exit;

$this->registerExtensionOptions( $this->className,
	[
		'_smtp_server'			=> array(
						'type'		=>	'display',
						'label'		=>	'<span class="dashicons dashicons-email-alt2"></span> <em>SMTP Server Settings</em>',
						'default'	=>	' ',
					),
		'smtp_server'			=> array(
						'type'		=>	'text',
						'label'		=>	'Server Name',
						'default'	=>	$this->get_network_option('smtp_server'),
						'info'		=>	'The outgoing mail server name.'
					),
		'smtp_port'				=> array(
						'type'		=>	'radio',
						'label'		=>	'Port Number',
						'options'	=>	['25','465','587','2587'],
						'default'	=>	$this->get_network_option('smtp_port') ?: '587',
						'info'		=>	'The mail server port to use.<br/>'.
										'Typically, port 25 = no encryption, port 465 = SSL encryption, port 587 = TLS encryption.',
					),
		'smtp_encryption'		=> array(
						'type'		=>	'radio',
						'label'		=>	'Encryption',
						'options'	=>	['none','SSL','TLS'],
						'default'	=> 	$this->get_network_option('smtp_encryption') ?: 'TLS',
						'info'		=>	'Does your mail server use encryption?',
					),
		'_smtp_auth'			=> array(
						'type'		=>	'display',
						'label'		=>	'<span class="dashicons dashicons-email-alt2"></span> <em>SMTP Authentication</em>',
						'default'	=>	' ',
					),
		'smtp_username'			=> array(
						'type'		=>	'text',
						'label'		=>	'User Name',
						'default'	=>	$this->get_network_option_decrypt('smtp_username'),
						'info'		=>	'The email address/username used to authenticate with your mail server.<br/>'.
										'<small>(encrypted when stored)</small>',
						'encrypt'	=> 	true,
						'attributes'=> ['autocomplete'=>'off'],
					),
		'smtp_password'			=> array(
						'type'		=>	'password',
						'label'		=>	'Password',
						'default'	=>	$this->get_network_option_decrypt('smtp_password'),
						'info'		=>	'The password used to authenticate with your mail server.<br/>'.
										'<small>(encrypted when stored)</small>',
						'encrypt'	=> 	true,
						'attributes'=> ['autocomplete'=>'new-password'],
					),
		'_smtp_sender'			=> array(
						'type'		=>	'display',
						'label'		=>	'<span class="dashicons dashicons-email-alt2"></span> <em>SMTP Sender</em>',
						'default'	=>	' ',
					),
		'smtp_fromname'			=> array(
						'type'		=>	'text',
						'label'		=>	'Send From Name',
						'default'	=>	\get_option('blogname'),
						'info'		=>	'The default name used when sending email.',
						'attributes'=> ['autocomplete'=>'off'],
					),
		'smtp_fromemail'		=> array(
						'type'		=>	'email',
						'label'		=>	'Send From Email',
						'default'	=>	\get_option('admin_email'),
						'info'		=>	'The default email address used when sending email.',
						'attributes'=> ['autocomplete'=>'off'],
					),
		'smtp_override'			=> array(
						'type'		=>	'checkbox',
						'label'		=>	'Override Senders',
						'options'	=>	['Enabled'],
						'info'		=>	'Always send from above name/address (overriding other scripts).'
					),
		'_smtp_ratelimit'			=> array(
						'type'		=>	'display',
						'label'		=>	'<span class="dashicons dashicons-email-alt2"></span> <em>Rate Limit</em>',
						'default'	=>	' ',
					),
		'smtp_limit_count'		=> array(
						'type'		=>	'number',
						'label'		=>	'Limit Emails Sent',
						'default'	=>  0,
						'info'		=>	'Rate limit emails to n emails every n minutes.',
						'attributes'=>	['min="0"', 'max="9999"','step="1"'],
					),
		'smtp_limit_time'		=> array(
						'type'		=>	'number',
						'label'		=>	'Limit per Minutes',
						'default'	=>  0,
						'info'		=>	'Rate limit emails to n emails every n minutes.',
						'attributes'=>	['min="0"', 'max="3600"','step="1"'],
					),
		'_smtp_headers'			=> array(
						'type'		=>	'display',
						'label'		=>	'<span class="dashicons dashicons-email-alt2"></span> <em>Optional Headers</em>',
						'default'	=>	' ',
					),
		'smtp_headers'			=> array(
						'type'		=>	'textarea',
						'label'		=>	'Default Headers',
						'default'	=>	$this->get_network_option('smtp_headers'),
						'info'		=>	'Add custom headers to all outgoing emails. One per line as: header-name: header-value'
					),
		'_smtp_debug'			=> array(
						'type'		=>	'display',
						'label'		=>	'<span class="dashicons dashicons-email-alt2"></span> <em>Logging &amp; Debugging</em>',
						'default'	=>	' ',
					),
		'smtp_log_sent'			=> array(
						'type'		=>	'checkbox',
						'label'		=>	'Log Sent Emails',
						'options'	=>	['Enabled'],
						'info'		=>	'Log all email sends to the system log file.',
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
		'_smtp_testing'			=> array(
						'type'		=>	'display',
						'label'		=>	'<span class="dashicons dashicons-email-alt2"></span> <em>Test Your Configuration</em>',
						'default'	=>	' ',
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
