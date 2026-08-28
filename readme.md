## {eac}Doojigger Simple SMTP Extension for WordPress
[![EarthAsylum Consulting](https://img.shields.io/badge/EarthAsylum-Consulting-0?&labelColor=6e9882&color=707070)](https://earthasylum.com/)
[![WordPress](https://img.shields.io/badge/WordPress-Plugins-grey?logo=wordpress&labelColor=blue)](https://wordpress.org/plugins/search/EarthAsylum/)
[![eacDoojigger](https://img.shields.io/badge/Requires-%7Beac%7DDoojigger-da821d)](https://eacDoojigger.earthasylum.com/)
[![Sponsorship](https://img.shields.io/static/v1?label=Sponsorship&message=%E2%9D%A4&logo=GitHub&color=bf3889)](https://github.com/sponsors/EarthAsylum)

<details><summary>Plugin Header</summary>

Plugin URI:         https://eacdoojigger.earthasylum.com/eacsimplesmtp/  
Author:             [EarthAsylum Consulting](https://www.earthasylum.com)  
Stable tag:         1.1.0  
Last Updated:       27-Aug-2026  
Requires at least:  5.8  
Tested up to:       7.1  
Requires PHP:       7.4  
Requires EAC:       3.0  
Contributors:       [kevinburkholder](https://profiles.wordpress.org/kevinburkholder)  
Donate link:        https://github.com/sponsors/EarthAsylum  
License:            GPLv3 or later  
License URI:        https://www.gnu.org/licenses/gpl.html  
Tags:               smtp, email, phpmailer, wp_mail, {eac}Doojigger  
WordPress URI:      https://wordpress.org/plugins/eacsimplesmtp  
GitHub URI:         https://github.com/EarthAsylum/eacSimpleSMTP  

</details>

> Send email using an SMTP email sever. Configure WordPress wp_mail, and phpmailer, to use your SMTP (outgoing) mail server when sending email.

### Description

_{eac}SimpleSMTP_ is an [{eac}Doojigger](https://eacDoojigger.earthasylum.com/) extension which adds SMTP server configuration for WordPress so that all email sent from your WordPress site will be sent through your SMTP mail server.

> What is SMTP? ... Simple Mail Transfer Protocol

{eac}SimpleSMTP options include...

__SMTP Server Settings__

+	_Server Name_

    The outgoing mail server name. Typically something like smtp.your_email_domain.com.

+	_Port Number_

    The mail server port to use. Typically, port 25 = no encryption, port 465 = SSL encryption, port 587 = TLS encryption. Port 2587 is often used as an alternative to port 587.

+	_Encryption_

    Does your mail server use encryption?

__SMTP Authentication__

+	_User Name_

    The email address/username used to authenticate with your mail server.

+	_Password_

    The password used to authenticate with your mail server.

__SMTP Sender__

+	_Send From Name_

    The default name used when sending email.

+	_Send From Email_

    The default email address used when sending email.

+	_Override Senders_

    Always send from above name/address (overriding other scripts).

__Rate Limit__

+	_Limit Emails Sent_

	When setting rate limits, this is the number of emails that can be sent in a given number of minutes.

+	_Limit per Minutes_

	When setting rate limits, this is the number of minutes to limit emails.

__Optional Headers__

+	_Default Headers_

    Add custom headers to all outgoing emails.

__Logging & Debugging__

+	_Log Sent Emails_

	Logs emails to the system error log.

+	SMTP Debugging

    Enable capture and logging of wp_mail and phpMailer debugging data.

+	_Send a Test_

    Send a test email to ensure your configuration is working.

#### Filters

Two filters are available to retrieve the _Send From Name_ and/or _Send From Email_

simpleSMTP_from_name

    $sendFromName = apply_filters( 'simpleSMTP_from_name', get_bloginfo('name') )

simpleSMTP_from_email

    $sendFromEmail = apply_filters( 'simpleSMTP_from_email', get_bloginfo('admin_email') )


### Installation

**{eac}Doojigger Simple SMTP Extension** is an extension plugin to and requires installation and registration of [{eac}Doojigger](https://eacDoojigger.earthasylum.com/).

#### Automatic Plugin Installation

This plugin is available from the [WordPress Plugin Repository](https://wordpress.org/plugins/search/earthasylum/) and can be installed from the WordPress Dashboard » *Plugins* » *Add New* page. Search for 'EarthAsylum', click the plugin's [Install] button and, once installed, click [Activate].

See [Managing Plugins -> Automatic Plugin Installation](https://wordpress.org/support/article/managing-plugins/#automatic-plugin-installation-1)

#### Upload via WordPress Dashboard

Installation of this plugin can be managed from the WordPress Dashboard » *Plugins* » *Add New* page. Click the [Upload Plugin] button, then select the eacsimplesmtp.zip file from your computer.

See [Managing Plugins -> Upload via WordPress Admin](https://wordpress.org/support/article/managing-plugins/#upload-via-wordpress-admin)

#### Manual Plugin Installation

You can install the plugin manually by extracting the eacsimplesmtp.zip file and uploading the 'eacsimplesmtp' folder to the 'wp-content/plugins' folder on your WordPress server.

See [Managing Plugins -> Manual Plugin Installation](https://wordpress.org/support/article/managing-plugins/#manual-plugin-installation-1)

#### Settings

Once installed and activated options for this extension will show in the 'Simple SMTP' tab of {eac}Doojigger settings.


### Screenshots

1. Simple Smtp
![{eac}SimpleSmtp Extension](https://ps.w.org/eacsimplesmtp/assets/screenshot-1.png)


### Other Notes

#### Additional Information

+	{eac}SimpleSMTP is an extension plugin to and requires installation and registration of [{eac}Doojigger](https://eacDoojigger.earthasylum.com/).


### Copyright

#### Copyright © 2026, EarthAsylum Consulting, distributed under the terms of the GNU GPL.

This program is free software: you can redistribute it and/or modify it under the terms of the GNU General Public License as published by the Free Software Foundation, either version 3 of the License, or (at your option) any later version.  

This program is distributed in the hope that it will be useful, but WITHOUT ANY WARRANTY; without even the implied warranty of MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the GNU General Public License for more details.

You should receive a copy of the GNU General Public License along with this program. If not, see [https://www.gnu.org/licenses/](https://www.gnu.org/licenses/).


