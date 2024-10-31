<?php 


defined( 'ABSPATH' ) or die( 'No script kiddies please!' );


?>

<div class="oxsn_pop_out_sidebar_widget widget_nav_menu oxsn_pop_out_return_link">
	<ul>
		<li>
			<a class="toggle_pop_out">
				<?php
					if (get_option('oxsn_pop_out_sidebar_close_text_control') != '') {
						$close_text = get_option( 'oxsn_pop_out_sidebar_close_text_control' );
					} else {
						$close_text = 'Return to ' . get_bloginfo('name') . ' →';
					}
					echo $close_text;
				?>
			</a>
		</li>
	</ul>
</div>

<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('pop-out-sidebar') ) : endif; ?>