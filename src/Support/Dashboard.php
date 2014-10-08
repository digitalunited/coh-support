<?php
namespace DigitalUnited\Support;

class Dashboard {

	public static function listen_for_action() {
		add_filter( 'DigitalUnited_Support_Tab_item', array( __CLASS__, 'tab' ), 10 );
		add_filter( 'DigitalUnited_Support_Tab_save_form_dashboard', '__return_false' );
		add_action( 'DigitalUnited_Support_Tab_display_dashboard', array( __CLASS__, 'display' ) );
		add_action( 'DigitalUnited_Support_Tab_update_dashboard', array( __CLASS__, 'update' ) );
	}

	static function tab( $items ) {
		$items['dashboard'] = __( 'Home', 'coh_support' );

		return $items;
	}

	static function display() {

		?>
			<input type="submit" class="button-primary" value="<?php _e( 'Create new Support Ticket', 'coh_support' ) ?>" onclick="location.href='?page=coh-support-desk&tab=issue&issue=0'" />
		<?php

	}

	static function update() {

	}

}
