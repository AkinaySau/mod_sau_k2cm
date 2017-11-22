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

?>
<div>
	<?php foreach ( $list as $item ): ?>
		<a href="<?php echo K2HelperRoute::getCategoryRoute( $item->id ); ?>" rel="<?php echo $item->name; ?>"><?php echo $item->name; ?></a>
	<?php endforeach; ?>
</div>