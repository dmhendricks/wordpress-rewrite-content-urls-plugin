<?php
/**
 * @wordpress-plugin
 * Plugin Name:       Rewrite Content URLs
 * Plugin URI:        https://bitbucket.org/ArlingtonCounty/acg-core-functionality/wiki
 * Description:       Allows you to rewrite URLs in content, useful for syncing production data into a development/staging environment.
 * Version:           1.0.0
 * Author:            Daniel M. Hendricks
 * Author URI:        https://www.danhendricks.com/
 * License:           GPL-2.0
 * License URI:       https://github.com/dmhendricks/wordpress-rewrite-content-urls-plugin/blob/master/LICENSE
 */
if( !defined('ABSPATH') ) die();

require( __DIR__ . '/vendor/autoload.php' );

if( defined( 'REWRITE_URL_PATTERNS' ) && REWRITE_URL_PATTERNS )
  new CloudVerve\RewriteContetUrls\Rewrite_URLs();
