=== {eac}Doojigger Simple SMTP Extension for WordPress ===
Plugin URI:         https://eacdoojigger.earthasylum.com/eacsimplesmtp/
Author:             [EarthAsylum Consulting](https://www.earthasylum.com)
Stable tag:         1.0.14
Last Updated:       29-Apr-2025
Requires at least:  5.8
Tested up to:       6.8
Requires PHP:       7.4
Requires EAC:       3.0
Contributors:       kevinburkholder
License:            GPLv3 or later
License URI:        https://www.gnu.org/licenses/gpl.html
Tags:               smtp, email, phpmailer, wp_mail, {eac}Doojigger
WordPress URI:      https://wordpress.org/plugins/eacsimplesmtp
GitHub URI:         https://github.com/EarthAsylum/eacSimpleSMTP

Send email using an SMTP email sever. Configure WordPress wp_mail, and phpmailer, to use your SMTP (outgoing) mail server when sending email.

== Description ==

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

= Filters =

Two filters are available to retrieve the _Send From Name_ and/or _Send From Email_

simpleSMTP_from_name

    $sendFromName = apply_filters( 'simpleSMTP_from_name', get_bloginfo('name') )

simpleSMTP_from_email

    $sendFromEmail = apply_filters( 'simpleSMTP_from_email', get_bloginfo('admin_email') )


== Installation ==

**{eac}Doojigger Simple SMTP Extension** is an extension plugin to and requires installation and registration of [{eac}Doojigger](https://eacDoojigger.earthasylum.com/).

= Automatic Plugin Installation =

This plugin is available from the [WordPress Plugin Repository](https://wordpress.org/plugins/search/earthasylum/) and can be installed from the WordPress Dashboard » *Plugins* » *Add New* page. Search for 'EarthAsylum', click the plugin's [Install] button and, once installed, click [Activate].

See [Managing Plugins -> Automatic Plugin Installation](https://wordpress.org/support/article/managing-plugins/#automatic-plugin-installation-1)

= Upload via WordPress Dashboard =

Installation of this plugin can be managed from the WordPress Dashboard » *Plugins* » *Add New* page. Click the [Upload Plugin] button, then select the eacsimplesmtp.zip file from your computer.

See [Managing Plugins -> Upload via WordPress Admin](https://wordpress.org/support/article/managing-plugins/#upload-via-wordpress-admin)

= Manual Plugin Installation =

You can install the plugin manually by extracting the eacsimplesmtp.zip file and uploading the 'eacsimplesmtp' folder to the 'wp-content/plugins' folder on your WordPress server.

See [Managing Plugins -> Manual Plugin Installation](https://wordpress.org/support/article/managing-plugins/#manual-plugin-installation-1)

= Settings =

Once installed and activated options for this extension will show in the 'Simple SMTP' tab of {eac}Doojigger settings.


== Screenshots ==

1. Simple Smtp
![{eac}SimpleSmtp Extension](https://ps.w.org/eacsimplesmtp/assets/screenshot-1.png)


== Other Notes ==

= Additional Information =

+   {eac}SimpleSMTP is an extension plugin to and requires installation and registration of [{eac}Doojigger](https://eacDoojigger.earthasylum.com/).


== Copyright ==

= Copyright © 2019-2025, EarthAsylum Consulting, distributed under the terms of the GNU GPL. =

This program is free software: you can redistribute it and/or modify it under the terms of the GNU General Public License as published by the Free Software Foundation, either version 3 of the License, or (at your option) any later version.

This program is distributed in the hope that it will be useful, but WITHOUT ANY WARRANTY; without even the implied warranty of MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the GNU General Public License for more details.

You should receive a copy of the GNU General Public License along with this program. If not, see [https://www.gnu.org/licenses/](https://www.gnu.org/licenses/).


== Changelog ==

= Version 1.0.14 – Apr 29, 2025 =

+   Shorten tab name to "SMTP".
+   Delay registration until `admin_init`.

= Version 1.0.13 – Apr 19, 2025 =

+   Compatible with WordPress 6.8.
+   Prevent `_load_textdomain_just_in_time was called incorrectly` notice from WordPress.
    +   All extensions - via eacDoojigger 3.1.
    +   Modified extension registration in constructor.

= Version 1.0.12 – Apr 10, 2024 =

+   Added notice if activated without {eac}Doojigger.

= Version 1.0.11 – October 31, 2023 =

+   Prevent direct load of included files.

= Version 1.0.10 – June 8, 2023 =

+   Removed unnecessary plugin_update_notice trait.

= Version 1.0.9 – May 11, 2023 =

+   Changed extension class name (case).
+   Externalized help, options, and test email (include when needed).
+   Updated contextual help.

= Version 1.0.8 – March 15, 2023 =

+   Set autocomplete attributes to prevent inadvertent auto-fill.

= Version 1.0.7 – November 15, 2022 =

+   Updated to / Requires {eac}Doojigger 2.0.
+   Uses 'options_settings_page' action to register options.
+   Added contextual help using 'options_settings_help' action.
+   Moved plugin_action_links_ hook to eacDoojigger_load_extensions filter.

= Version 1.0.6 – September 25, 2022 =

+   Fixed potential PHP notice on load (plugin_action_links_).
+   Added upgrade notice trait for plugins page.

= Version 1.0.5 – August 28, 2022 =

+   Updated to / Requires {eac}Doojigger 1.2
+   Added 'Settings', 'Docs' and 'Support' links on plugins page.

= Version 1.0.4 – August 2, 2022 =

+   Cosmetic changes for WordPress submission.

= Version 1.0.3 – June 9, 2022 =

+   Updated for {eac}Doojigger 1.1.0

= Version 1.0.2 – May 10, 2022 =

+   Added filters to retrieve email "from" address/name
+   Allow loading under cron for scheduled events.

= Version 1.0.1 – April 28, 2022 =

+   Added debugging option - captures output from wp_mail and phpMailer (with SMTP debugging)

= Version 1.0.0 – March 23, 2022 =

+   Initial release.


== Upgrade Notice ==

= 1.0.7 =

Requires {eac}Doojigger version 2.0+

