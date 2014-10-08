<?php
namespace DigitalUnited\Support;

class DashboardPage {

	public static function listen_for_action() {

		add_action( 'admin_menu', array( __CLASS__, 'admin_menu' ) );
		add_action( 'admin_bar_menu', array( __CLASS__, 'add_toolbar_items' ), 100 );
		add_action( 'wp_dashboard_setup', array( __CLASS__, 'remove_dashboard_widgets' ) );
		add_action( 'wp_dashboard_setup', array( __CLASS__, 'add_dashboard_widgets' ) );

	}

	public static function render_page() {

		?>
		<div class="wrap about-wrap">
			<h1><?php _e( 'Care Of Haus &#9829; Support' ); ?></h1>

			<div class="about-text">
				We would like to hear from you!
			</div>
		</div>
		<?php

        Dashboard::listen_for_action();
		Backlog::listen_for_action();
		Issue::listen_for_action();
		Settings::listen_for_action();
		Tab::display();

	}

	public static function remove_dashboard_widgets() {

	}

	public static function add_dashboard_widgets() {
		if ( is_admin() ) {

			$screen = get_current_screen();

			wp_add_dashboard_widget(
				'w123',
				'test',
				array( __CLASS__, 'render_widget' )
			);

		}
	}

	public static function render_widget() {

		echo "123";

	}

	public static function admin_menu() {

		add_dashboard_page( 'Care Of Haus', '&#9829; Care Of Haus', 'read', 'coh-support-desk',
			array( __CLASS__, 'render_page' ) );

	}

	public static function add_toolbar_items( $wp_admin_bar ) {
		$args = array(
			'id'    => 'coh-support-main',
			'title' => '&#9829; Care Of Haus',
			'href'  => admin_url( 'index.php?page=coh-support-desk' ),
			'meta'  => array(
				'title' => __( '&#9829; Care Of Haus' ),
			),
		);
		$wp_admin_bar->add_node( $args );
	}

}
