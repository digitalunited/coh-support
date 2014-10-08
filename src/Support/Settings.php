<?php
namespace DigitalUnited\Support;

class Settings {

    public static function listen_for_action() {
        add_filter( 'DigitalUnited_Support_Tab_item', array( __CLASS__, 'tab' ), 40 );
        add_action( 'DigitalUnited_Support_Tab_display_settings', array( __CLASS__, 'display' ) );
        add_action( 'DigitalUnited_Support_Tab_update_settings', array( __CLASS__, 'update' ) );
    }

    static function tab( $items ) {
        $items['settings'] = __( 'Settings', 'coh_support' );

        return $items;
    }

    static function display() {

    }

    static function update() {

    }

}
