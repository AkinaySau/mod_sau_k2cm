<?php
/**
 * @package    sau_k2cm
 *
 * @author     AkinaySau <your@email.com>
 * @copyright  A copyright
 * @license    GNU General Public License version 2 or later; see LICENSE.txt
 * @link       http://your.url.com
 */

defined( '_JEXEC' ) or die;

JLoader::register( 'SauK2cmHelper', __DIR__ . '/helper.php' );


if ( $params->get( 'type', 0 ) ) {
	$list = SauK2cmHelper::getCats( $params->get( 's2_categories', [] ), $params );
} else {
	$list = SauK2cmHelper::getCats( (int) $params->get( 's1_category_id', 0 ), $params );
}

require JModuleHelper::getLayoutPath( 'mod_sau_k2cm', $params->get( 'layout', 'default' ) );