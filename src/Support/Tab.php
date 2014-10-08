<?php

namespace DigitalUnited\Support;

class Tab {

	static function display() {

		$prefix = str_replace( '\\', '_', get_class() ) . '_';

		$items = apply_filters( $prefix . 'item', array() );

		if ( sizeof( $items ) ) {

			$keys        = array_keys( $items );
			$current_tab = $keys[0];

			if ( isset( $_REQUEST['tab'] ) && ! empty( $_REQUEST['tab'] ) ) {
				$current_tab = $_REQUEST['tab'];
			}

			if ( isset( $_REQUEST['nonce'] ) && wp_verify_nonce( $_REQUEST['nonce'], 'update_tab' ) ) {
				echo "<br/>";
				do_action( $prefix . 'update_' . $current_tab );
			}

			echo '<h2 class="nav-tab-wrapper">';
			foreach ( $items as $tab => $name ) {
				$class = ( $tab == $current_tab ) ? ' nav-tab-active' : '';
				echo "<a class=\"nav-tab$class\" href=\"?page=$_REQUEST[page]&tab=$tab\">$name</a>";
			}
			echo '</h2>';

			$save_form = apply_filters( $prefix . 'save_form_' . $current_tab, true );

			if ( $save_form ) {

				$files = apply_filters( $prefix . 'files_enabled', false );
				?>
				<form method="post" <?php if ( $files ) {
					echo 'enctype="multipart/form-data"';
				} ?>>
					<?php do_action( $prefix . 'display_' . $current_tab ); ?>
					<p class="submit">
						<input type="submit" class="button-primary" value="<?php _e( 'Save Changes',
							'coh_support' ) ?>" />
						<input type="hidden" name="nonce" value="<?php echo wp_create_nonce( 'update_tab' ); ?>" />
						<input type="hidden" name="tab" value="<?php echo $current_tab; ?>" />
					</p>
				</form>
			<?php

			}
			else {
				do_action( $prefix . 'display_' . $current_tab );
			}

		}

	}


}

