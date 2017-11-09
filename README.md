# Wordpress theme development
The Wordpress base is based on [bootstrap 3.0](http://getbootstrap.com/) & starter theme called [_s](https://github.com/Automattic/_s), or [underscores](https://github.com/Automattic/_s).

### Modifing wp-config.php
The following code, inserted in your wp-config.php file, will log all errors, notices, and warnings to a file called debug.log in the wp-content directory. It will also hide the errors so they do not interrupt page generation.
```
 // Enable WP_DEBUG mode
define( 'WP_DEBUG', true );

// Enable Debug logging to the /wp-content/debug.log file
define( 'WP_DEBUG_LOG', true );

// Disable display of errors and warnings 
define( 'WP_DEBUG_DISPLAY', false );
@ini_set( 'display_errors', 0 );

// Use dev versions of core JS and CSS files (only needed if you are modifying these core files)
define( 'SCRIPT_DEBUG', true );

//The SAVEQUERIES definition saves the database queries to an array which can be displayed to help analyze those queries. 
define( 'SAVEQUERIES', true );
```

### Debuging  Plugins
There are many debugging plugins for WordPress that show more information about the internals, either for a specific component or in general. Here are some examples:
- [Core Control](https://wordpress.org/plugins/core-control/) is a set of plugin modules which can be used to control certain aspects of the WordPress control.
- [Query Monitor](https://wordpress.org/plugins/query-monitor/)
- [Debug Bar](https://wordpress.org/plugins/debug-bar/) Adds a debug menu to the admin bar that shows query, cache, and other helpful debugging information.
- [Debug Bar Console](http://wordpress.org/plugins/debug-bar-console/) Adds a PHP/SQL console to the debug bar. Requires the debug bar plugin.
- [Debug Bar Cron](https://wordpress.org/plugins/debug-bar-cron/) Adds information about WP scheduled events to Debug Bar.
- [Debug Bar Extender](https://wordpress.org/plugins/debug-bar-extender/) A minimalistic profiler / debugging class that hooks into the debug bar and can be implemented easily
- [Developer](https://wordpress.org/plugins/developer/) The first stop for every WordPress developer
- [Log Deprecated Notices](https://wordpress.org/plugins/log-deprecated-notices/) Logs the usage of deprecated files, functions, hooks, and function arguments, offers the alternative if available, and identifies where the deprecated functionality is being used. WP_DEBUG not required (but its general use is strongly recommended).
- [Log Viewer](https://wordpress.org/plugins/log-viewer/) This plugin provides an easy way to view log files directly in the admin panel.
- [Monster Widget](https://wordpress.org/plugins/monster-widget/) A widget that allows for quick and easy testing of multiple widgets. Not intended for production use.
- [Regenerate Thumbnails](https://wordpress.org/plugins/regenerate-thumbnails/) Allows you to regenerate all thumbnails after changing the thumbnail sizes.
- [Rewrite Rules Inspector](https://wordpress.org/plugins/rewrite-rules-inspector/) Simple WordPress Admin view for inspecting your rewrite rules
- [Simply Show IDs](https://wordpress.org/plugins/simply-show-ids/) Simply shows the ID of Posts, Pages, Media, Links, Categories, Tags and Users in the admin tables for easy access. Very lightweight.
- [Theme Check](https://wordpress.org/plugins/theme-check/) A simple and easy way to test your theme for all the latest WordPress standards and practices. A great theme development tool!
- [Theme Test Drive](https://wordpress.org/plugins/theme-test-drive/) Safely test drive any theme while visitors are using the default one. Includes instant theme preview via thumbnail.
- [User Switching](https://wordpress.org/plugins/user-switching/)Instant switching between user accounts in WordPress
- [WordPress Beta Tester](https://wordpress.org/plugins/wordpress-beta-tester/) Allows you to easily upgrade to Beta releases.
- [Total Security](https://wordpress.org/plugins/total-security/) Check your site for security vulnerabilities and holes.

### Check some of the Links for more information
- [Theme Development Unit Test](https://codex.wordpress.org/Theme_Unit_Test)
- [Theme Development](https://codex.wordpress.org/Theme_Development#Theme_Testing_Process)




