<?php
namespace CloudVerve\RewriteContetUrls;
use \Wa72\HtmlPageDom\HtmlPageCrawler;

/**
 * Rewrite URLs based on wp-config.php constants
 * @since 1.0.0
 */
class Rewrite_URLs {

  function __construct() {

    add_filter( 'final_output', array( $this, 'dom_rewrite_content_links' ) );

  }

  /**
   * DOM parser function
   *
   * @param string Page contents in HTML format
   * @return string Modified page contents
   * @since 1.0.0
   * @see https://github.com/wasinger/htmlpagedom
   */
  public function dom_rewrite_content_links( $page ) {

    $html = HtmlPageCrawler::create( $page );
    $links = $html->filter( 'a[href]' );
    foreach( $links as $link ) {
      $link_href = $link->getAttribute( 'href' );
      $link->setAttribute( 'href', $this->rewrite_url( $link_href ) );
    }
    //$links->setAttribute( 'href', '/test' );
    $html->saveHTML();

    return $html;

  }

  private function rewrite_url( $url ) {

    foreach( REWRITE_URL_PATTERNS as $pattern => $replace ) {
      $url = preg_replace( $pattern, $replace, $url );
    }

    return $url;

  }

}
?>
