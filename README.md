[![Author](https://img.shields.io/badge/author-Daniel%20M.%20Hendricks-lightgrey.svg?colorB=9900cc )](https://www.danhendricks.com/??utm_source=github.com&utm_medium=campaign&utm_content=button&utm_campaign=wordpress-rewrite-content-urls-plugin)
[![Latest Version](https://img.shields.io/github/release/dmhendricks/wordpress-rewrite-content-urls-plugin.svg)](https://github.com/dmhendricks/wordpress-rewrite-content-urls-plugin/releases)
[![GitHub License](https://img.shields.io/badge/license-GPLv2-yellow.svg)](https://raw.githubusercontent.com/dmhendricks/wordpress-rewrite-content-urls-plugin/master/LICENSE)
[![FlyWheel](https://img.shields.io/badge/style-FlyWheel-green.svg?style=flat&label=get%20hosted&colorB=AE2A21)](https://getflywheel.com/why-flywheel/?utm_source=github.com&utm_medium=campaign&utm_content=button&utm_campaign=wordpress-rewrite-content-urls-plugin)
[![Donate](https://img.shields.io/badge/Donate-PayPal-green.svg)](https://paypal.me/danielhendricks)
[![Twitter](https://img.shields.io/twitter/url/https/github.com/dmhendricks/wordpress-rewrite-content-urls-plugin.svg?style=social)](https://twitter.com/danielhendricks)

# Rewrite Content URLs

This plugin allows you to rewrite URLs in content.

This plugin was primarily designed for developers, useful for development/staging environments after syncing data from a MySQL dump.

**DO NOT USE IN PRODUCTION:** This plugin should only be used for **development/staging** sites with frequently-synced data, as it creates a performance penalty.

:pushpin: Use in conjunction with: [Network Sub-domain Updater](https://github.com/dmhendricks/wordpress-network-subdomain-updater-plugin) for WordPress multisite

## Requirements

* WordPress 4.5 or higher
* **PHP 7.0** or higher
* **[output-buffering.php](https://github.com/dmhendricks/wordpress-output-buffering)** *must* be copied to your WordPress `mu-plugins` directory.

This plugin *will not work* on versions of PHP below 7.0.

## Installation

1. Download and unzip the plugin to your WordPress plugins directory.
1. Open `wp-config.php` for your site and define the `REWRITE_URL_PATTERNS` constant.
1. Activate the plugin.

There is no settings page in WP Admin for this plugin. All options are configured through `wp-config.php` constants.

### Configuration

In order for this plugin to work, you must add a `REWRITE_URL_PATTERNS` constant to your `wp-config.php`.

Example of simply replacing the page links' domain:
```php
define( 'REWRITE_URL_PATTERNS', [ '/mydomain.com/' => 'mydomain.local' ] );
```

Example of simply replacing the page links' domain AND stripping 'www' (useful if your local development stack doesn't alias it):
```php
define( 'REWRITE_URL_PATTERNS', [ '/(www.)?mydomain.com/' => 'mydomain.local' ] );
```

Since the constant expects an array, you and add multiple match expressions.

## Use Case

Let's say you run a WordPress Network of sub-domains. If you did a MySQL dump from your production server  (example.com) and then imported to your staging (staging.example.com) or local development (example.local) instance and **[updated the domains](https://github.com/dmhendricks/wordpress-network-subdomain-updater-plugin)**, the links in your page content will be pointing to the production site.

This plugin replaces URL patterns in content, defined by `REWRITE_URL_PATTERNS` constant.

For example, I use [Local by Flywheel](https://local.getflywheel.com/) for local WordPress development:

1. Create a local WordPress multisite instance.
1. Copy necessary file assets (plugins, themes, uploads, etc) from the remote site.
1. Install this plugin on your staging or development instance (not on production!)
4. Define the `REWRITE_URL_PATTERNS` in `wp-config.php`.

Now when you view pages on your instance, the links will be rewritten to your new domain.

## Frequently Asked Questions

**Q: Why did you use a constant to define the replacement URLs and not a settings page in WP Admin?**

A: This plugin was designed for developers who sync data via a MySQL dump from a production site to staging/local development. Because of this, any settings set in WP Admin would be blown away.

## Future Ideas

* Ability to rewrite image URLs
* Ability to set filter exceptions
* Possibility of moving configuration to file

## Change Log

Release changes are noted on the [Releases](https://github.com/dmhendricks/wordpress-rewrite-content-urls-plugin/releases) page.

#### Branch: `master`

* None since release
