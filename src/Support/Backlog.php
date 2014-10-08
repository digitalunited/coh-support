<?php
namespace DigitalUnited\Support;

class Backlog {

    public static function listen_for_action() {
        add_filter( 'DigitalUnited_Support_Tab_item', array( __CLASS__, 'tab' ), 20 );
        add_filter( 'DigitalUnited_Support_Tab_save_form_backlog', '__return_false' );
        add_action( 'DigitalUnited_Support_Tab_display_backlog', array( __CLASS__, 'display' ) );
        add_action( 'DigitalUnited_Support_Tab_update_backlog', array( __CLASS__, 'update' ) );
    }

    static function tab( $items ) {
        $items['backlog'] = __( 'Backlog', 'coh_support' );
        return $items;
    }

    static function display() {

    }

    static function update() {

    }

}
