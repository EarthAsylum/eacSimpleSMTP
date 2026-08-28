<?php
namespace EarthAsylumConsulting\Extensions;

if (! class_exists(__NAMESPACE__.'\Simple_SMTP_extension', false) )
{
	/**
	 * Extension: simple_smtp - Configure phpmailer using SMTP server
	 *
	 * @category	WordPress Plugin
	 * @package		{eac}Doojigger\Extensions
	 * @author		Kevin Burkholder <KBurkholder@EarthAsylum.com>
	 * @copyright	Copyright (c) 2026 EarthAsylum Consulting <www.EarthAsylum.com>
	 */

	class Simple_SMTP_extension extends \EarthAsylumConsulting\abstract_extension
	{
		/**
		 * @var string extension version
		 */
		const VERSION		= '26.0827.1';

		/**
		 * @var string to set default tab name
		 */
		const TAB_NAME		= 'SMTP';

		/**
		 * @var string|array|bool to set (or disable) default group display/switch
		 * 		false 		disable the 'Enabled'' option for this group
		 * 		string 		the label for the 'Enabled' option
		 * 		array 		override options for the 'Enabled' option (label,help,title,info, etc.)
		 */
		const ENABLE_OPTION	= 'Simple SMTP';


		/**
		 * constructor method
		 *
		 * @param	object	$plugin main plugin object
		 * @return	void
		 */
		public function __construct($plugin)
		{
			parent::__construct($plugin, self::DEFAULT_DISABLED | self::ALLOW_ALL);

			add_action('admin_init', function()
			{
				$this->registerExtension( $this->className );
				// Register plugin options when needed
				$this->add_action( "options_settings_page", array($this, 'admin_options_settings') );
				// Add contextual help
				$this->add_action( 'options_settings_help', array($this, 'admin_options_help') );
			});
		}


		/**
		 * register options on options_settings_page
		 *
		 * @access public
		 * @return void
		 */
		public function admin_options_settings()
		{
			require 'includes/simple_smtp.options.php';
		}


		/**
		 * Add help tab on admin page
		 *
		 * @return	void
		 */
 		public function admin_options_help()
		{
			if (!$this->plugin->isSettingsPage(self::TAB_NAME)) return;

			require 'includes/simple_smtp.help.php';
		}


		/**
		 * initialize method - called from main plugin
		 *
		 * @return	void
		 */
		public function initialize()
		{
			if ( ! parent::initialize() ) return; // disabled
		}


		/**
		 * Add filters and actions - called from main plugin
		 *
		 * @return	void
		 */
		public function addActionsAndFilters()
		{
			parent::addActionsAndFilters();

			\add_action( 'phpmailer_init', 	array( $this, 'phpmailer_init' ) );
			\add_filter( 'wp_mail', 		array( $this, 'wp_mail_headers' ), 999);

			if ($this->is_option('smtp_override'))
			{
				if ($from = $this->get_option('smtp_fromemail'))
				{
					\add_filter( 'wp_mail_from', function($email) use ($from)
						{
							return $from;
						}, 999);
				}
				if ($from = $this->get_option('smtp_fromname'))
				{
					\add_filter( 'wp_mail_from_name', function($name) use ($from)
						{
							return $from;
						}, 999);
				}
			}

			\add_filter( 'simpleSMTP_from_name', function($from=null)
				{
					return $this->get_option('smtp_fromname') ?: $from;
				}
			);
			\add_filter( 'simpleSMTP_from_email', function($from=null)
				{
					return $this->get_option('smtp_fromemail') ?: $from;
				}
			);

			if ($this->is_option('smtp_log_sent'))
			{
				\add_action( 'wp_mail_succeeded', 	array( $this, 'log_email_sent' ) );
				\add_action( 'wp_mail_failed', 		array( $this, 'log_email_failed' ) );
			}

			if ($this->is_option('smtp_limit_count') && $this->is_option('smtp_limit_time'))
			{
				\add_filter( 'pre_wp_mail', 		array( $this, 'check_email_limit'), 10, 2 );
			}
		}


		/**
		 * set phpmailer options for SMTP server use (called from wp_mail)
		 *
		 * @param object	$phpmailer - phpmailer object
		 * @return	void
		 */
		public function phpmailer_init(object $phpmailer)
		{
			if ($debugLevel = $this->get_option('smtp_debug'))
			{
				$phpmailer->SMTPDebug  = $debugLevel;
				\add_action( 'wp_mail_succeeded', 	array( $this, 'wp_mail_complete' ));
				\add_action( 'wp_mail_failed', 		array( $this, 'wp_mail_complete' ));
				ob_start();
			}

			if ($this->is_option('smtp_server'))
			{
				$phpmailer->isSMTP();
				$phpmailer->Host			= $this->get_option('smtp_server');
				$phpmailer->Port			= $this->get_option('smtp_port');
			}

			if ( ($username = $this->get_option_decrypt('smtp_username')) && ($password = $this->get_option_decrypt('smtp_password')) )
			{
				$phpmailer->SMTPAuth	= true;
				$phpmailer->Username	= $username;
				$phpmailer->Password	= $password;
			}
			else
			{
				$phpmailer->SMTPAuth	= false;
			}

			$encryption = $this->get_option('smtp_encryption');
			if ($encryption && $encryption != 'none')
			{
				$phpmailer->SMTPSecure	= $encryption;
			}
		}


		/**
		 * debugging - after when wp_mail sends email
		 *
		 * @param array|wp_error $mail_data An array containing the mail recipient, subject, message, headers, and attachments
		 * @return	void
		 */
		public function wp_mail_complete($mail_data)
		{
			$debug = ob_get_clean();
			$this->plugin->logDebug([$mail_data,$debug],__METHOD__);
		}


		/**
		 * wp_mail custom headers
		 *
		 * @param array	$args - wp_mail args
		 * @return	void
		 */
		public function wp_mail_headers($args)
		{
			if (! ($headers = $this->get_option('smtp_headers')) )
			{
				return $args;
			}

			$headers = explode( "\n", str_replace( "\r\n", "\n", $headers ) );

			if (! empty($args['headers']) )
			{
				if (! is_array($args['headers']) ) {
					$args['headers'] = explode( "\n", str_replace( "\r\n", "\n", $args['headers'] ) );
				}
				$args['headers'] = array_merge($headers,$args['headers']);
			}
			else
			{
				$args['headers'] = $headers;
			}
			return $args;
		}


		/**
		 * on wp_mail_succeeded action when logging emails sent
		 *
		 * @param array	$args - wp_mail args
		 * @return	void
		 */
		public function log_email_sent(array $mail_data)
		{
			$this->log_email_write($mail_data,'sent');
		}


		/**
		 * on wp_mail_failed action when logging emails sent
		 *
		 * @param object	$wperror - wp_mail error
		 * @return	void
		 */
		public function log_email_failed($wperror)
		{
			$mail_data = $wperror->get_error_data();
			$this->log_email_write($mail_data,'failed');
		}


		/**
		 * log sent emails
		 *
		 * @param array	$args - wp_mail args
		 * @return	void
		 */
		public function log_email_write(array $args, string $status)
		{
			if (is_array($args['to'])) {
				$args['to'] = implode(', ',$args['to']);
			}
			if (!empty($args['attachments']) && is_string($args['attachments'])) {
				$args['attachments'] = explode(',',$args['attachments']);
			}
			$message = sprintf("SMTP Email %s - To: [%s], Subject: [%s], Attached: %d",
				ucwords($status),
				$args['to'] ?: 'unset',
				$args['subject'] ?: 'unset',
				(!empty($args['attachments']) ? count($args['attachments']) : 0),
			);
			$this->plugin->logNotice($message);
			error_log( $message . sprintf(", 'IP: %s, URI: %s ",
				$this->plugin->getVisitorIP(),
				$this->plugin->varServer('request_uri'),
			));
		}


		/**
		 * on pre_wp_mail action when limiting emails sent
		 *
		 * @param bool|null	$value non-null prevents send
		 * @param array	$args - wp_mail args
		 * @return	void
		 */
		public function check_email_limit($value, array $mail_data)
		{
			$limit 	= intval($this->get_option('smtp_limit_count',0));
			$time 	= MINUTE_IN_SECONDS * intval($this->get_option('smtp_limit_time',1));
			$trans 	= $this->plugin->get_transient('smtp_rate_limit', function($id) use($time)
				{
					return [0,$time];
				}, $time
			);
			$count 	= ++$trans[0];
			$this->plugin->set_transient('smtp_rate_limit',$trans,$trans[1]);
			if ($limit && $count <= $limit) {
				return $value;
			}
			if ($this->is_option('smtp_log_sent')) {
				$this->log_email_write($mail_data,'blocked');
			}
			$this->do_action('register_risk','smtp rate limit exceeded');
			return false;
		}


		/**
		 * filter for options_form_post_ _smtp_testemail
		 *
		 * @param string	$email - the value POSTed
		 * @param string	$fieldName - the name of the field/option
		 * @param array		$metaData - the option metadata
		 * @param string	$priorValue - the prior option value
		 * @return string	$email
		 */
		public function send_test_email($email, $fieldName=null, $metaData=null, $priorValue=null)
		{
			if (! ($testEmail = filter_var( $email, FILTER_VALIDATE_EMAIL )) )
			{
				return $email;
			}

			$content = require 'includes/simple_smtp.email.php';
			$fromName 	= $this->get_option('smtp_fromname') ?: \get_option('blogname');
			$fromEmail 	= $this->get_option('smtp_fromemail') ?: \get_option('admin_email');

			$result = wp_mail(
				$testEmail,
				\get_option('blogname')." SMTP Email Test",
				$content,
				[
					"from: ".$fromName.' <'.$fromEmail.'>',
					"Content-type: text/html"
				]
			);
		}
	}
}
/**
 * return a new instance of this class
 */
if (isset($this)) return new Simple_SMTP_extension($this);
?>
