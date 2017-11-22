<?php
/**
 * Created for sau_k2cm.
 * User: AkinaySau akinaysau@gmail.ru
 * Date: 21.11.2017
 * Time: 16:10
 */

use Joomla\CMS\Factory;

/**
 * Class SauK2cmHelper
 */
abstract class SauK2cmHelper {
	protected static $deep;

	public static function getCats( $cat, $params ): array {
		if ( ! is_int( $cat ) && ! is_array( $cat ) ) {
			return [];
		}
		$db    = Factory::getDbo();
		$query = $db->getQuery( true );

		if ( is_int( $cat ) && $cat ) {
			self::$deep = (int) $params->get( 's1_children_level' );
			$parent     = $cat;
			$query->select( $db->quoteName( [ 'id', 'name', 'parent' ] ) )
			      ->from( '#__k2_categories' );
			if ( self::$deep == - 1 ) {
				$query->where( $db->quoteName( 'id' ) . '=' . $db->quote( $cat ) );
			}
			$cats = $db->setQuery( $query )
			           ->loadObjectList( 'id' );

			$cats = self::filter( $cats, $parent);

			return $cats;
		} else {
			$query->select( $db->quoteName( [ 'id', 'name' ] ) )
			      ->from( '#__k2_categories' )
			      ->where( $db->quoteName( 'id' ) . ' IN (' . implode( ',', $cat ) . ')' );

			return $db->setQuery( $query )
			          ->loadObjectList( 'id' );
		}
	}

	protected static function filter( &$cats, $parent, $deep = 0 ) {
		foreach ( $cats as $key => $value ) {
			if ( $key == $parent || $value->parent == $parent ) {
				$return[$key] = $value;
				unset( $cats[$key] );
				if ( $deep <= self::$deep || self::$deep === 0 ) {
					$return = $return + self::filter( $cats, $key, ++ $deep );
				}
			}
		}

		return $return ?? [];
	}
}