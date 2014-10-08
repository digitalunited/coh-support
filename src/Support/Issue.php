<?php
namespace DigitalUnited\Support;

class Issue {

    public static function listen_for_action() {
        add_filter( 'DigitalUnited_Support_Tab_item', array( __CLASS__, 'tab' ), 30 );
        add_filter( 'DigitalUnited_Support_Tab_save_form_issue', '__return_false' );
        add_action( 'DigitalUnited_Support_Tab_display_issue', array( __CLASS__, 'display' ) );
        add_action( 'DigitalUnited_Support_Tab_update_issue', array( __CLASS__, 'update' ) );
    }


    static function tab( $items ) {
        $items['issue'] = __( 'Issue', 'coh_support' );

        return $items;
    }

    static function display() {

    }

    static function update() {

    }

}
