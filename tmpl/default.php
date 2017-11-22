<?php
/**
 * @package    sau_k2cm
 *
 * @author     AkinaySau <akinaysau@gmail.com>
 * @copyright  AkinaySau
 * @license    GNU General Public License version 2 or later; see LICENSE.txt
 * @link       http://a-sau.ru
 */

defined( '_JEXEC' ) or die;

?>
<div>
	<?php foreach ( $list as $item ): ?>
		<a href="<?php echo K2HelperRoute::getCategoryRoute( $item->id ); ?>" rel="<?php echo $item->name; ?>"><?php echo $item->name; ?></a>
	<?php endforeach; ?>
</div>