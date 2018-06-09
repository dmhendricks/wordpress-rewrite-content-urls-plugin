=== Rewrite Content URLs ===
Contributors: hendridm
Tags: rewrite,content,links,urls
Donate link: https://paypal.me/danielhendricks
Requires at least: 4.7
Tested up to: 4.9.6
Stable tag: 1.0.0
License: GPL-2.0
License URI: https://github.com/dmhendricks/wordpress-rewrite-content-urls-plugin/blob/master/LICENSE

Rewrite URLs contained within content.

== Description ==
This plugin allows you to rewrite URLs in content.

This plugin was primarily designed for developers, useful for development/staging environments after syncing data from a MySQL dump.

= Requirements =

* WordPress 4.7 or higher
* **PHP 7.0** or higher

== Installation ==
1. Download and unzip the plugin to your WordPress plugins directory.
2. Open `wp-config.php` for your site and define the `REWRITE_URL_PATTERNS` constant.
3. Activate the plugin.

=== Configuration ===
In order for this plugin to work, you must add a `REWRITE_URL_PATTERNS` constant to your `wp-config.php`.

Example of simply replacing the page links' domain:
```
define('REWRITE_URL_PATTERNS', [ '/mydomain.com/' => 'mydomain.local' ] );
```

Example of simply replacing the page links' domain AND stripping 'www' (useful if your local development stack doesn't alias it):
```
define('REWRITE_URL_PATTERNS', [ '/(www.)?mydomain.com/' => 'mydomain.local' ] );
```

Since the constant expects an array, you and add multiple match expressions.

== Frequently Asked Questions ==
= Q: Why did you use a constant to define the replacement URLs and not a settings page in WP Admin? =
A: This plugin was designed for developers who sync data via a MySQL dump from a production site to staging/local development. Because of this, any settings set in WP Admin would be blown away.
