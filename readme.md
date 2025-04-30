## {eac}Doojigger Simple SMTP Extension for WordPress  
[![EarthAsylum Consulting](https://img.shields.io/badge/EarthAsylum-Consulting-0?&labelColor=6e9882&color=707070)](https://earthasylum.com/)
[![WordPress](https://img.shields.io/badge/WordPress-Plugins-grey?logo=wordpress&labelColor=blue)](https://wordpress.org/plugins/search/EarthAsylum/)
[![eacDoojigger](https://img.shields.io/badge/Requires-%7Beac%7DDoojigger-da821d)](https://eacDoojigger.earthasylum.com/)

<details><summary>Plugin Header</summary>

Plugin URI:         https://eacdoojigger.earthasylum.com/eacsimplesmtp/  
Author:             [EarthAsylum Consulting](https://www.earthasylum.com)  
Stable tag:         1.0.14  
Last Updated:       29-Apr-2025  
Requires at least:  5.8  
Tested up to:       6.8  
Requires PHP:       7.4  
Requires EAC:       3.0  
Contributors:       [kevinburkholder](https://profiles.wordpress.org/kevinburkholder)  
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

+   _SMTP Server Name_

    The outgoing mail server name. Typically something like smtp.your_email_domain.com.

+   _SMTP Port_

    The mail server port to use. Typically, port 25 = no encryption, port 465 = SSL encryption, port 587 = TLS encryption.

+   _SMTP Encryption_

    Does your mail server use encryption?

+   _SMTP User Name_

    The email address/username used to authenticate with your mail server.

+   _SMTP Password_

    The password used to authenticate with your mail server.

+   _Send From Name_

    The default name used when sending email.

+   _Send From Email_

    The default email address used when sending email.

+   _Override Senders_

    Always send from above name/address (overriding other scripts).

+   SMTP Debugging

    Enable capture and logging of wp_mail and phpMailer debugging data.

+   _Default Headers_

    Add custom headers to all outgoing emails.

+   _Send a Test_

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

+   {eac}SimpleSMTP is an extension plugin to and requires installation and registration of [{eac}Doojigger](https://eacDoojigger.earthasylum.com/).


