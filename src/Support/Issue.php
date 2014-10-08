<?php
namespace DigitalUnited\Support;

use Zendesk\API\Client as ZendeskAPI;

class Issue {

	public static function listen_for_action() {
		add_filter( 'DigitalUnited_Support_Tab_item', array( __CLASS__, 'tab' ), 30 );
		add_filter( 'DigitalUnited_Support_Tab_save_form_issue', '__return_false' );
		add_action( 'DigitalUnited_Support_Tab_display_issue', array( __CLASS__, 'display' ) );
		add_action( 'DigitalUnited_Support_Tab_update_issue', array( __CLASS__, 'update' ) );
		add_action( 'wp_ajax_create_support_ticket', array( __CLASS__, 'create_support_ticket' ) );
	}

	static function tab( $items ) {
		$items['issue'] = __( 'Issue', 'coh_support' );

		return $items;
	}

	static function display() {

		?>

		<form>
			<p>
				Message:<br />
				<textarea name="message" id="message" cols="100" rows="10"></textarea>
			</p>
			<input type="submit" onclick="return create_support_ticket(jQuery('#message').val());" class="button-primary" value="Send" />
		</form>

		<script>
			function create_support_ticket(message) {
				jQuery.ajax({
					type : "POST",
					url  : '/wp/wp-admin/admin-ajax.php',
					data : {
						'message': message,
						'action' : 'create_support_ticket'
					},
					async: false
				}).done(function (data) {
				});

				return false;
			}
		</script>

	<?php
	}

	static function update() {

	}

	static function create_support_ticket() {

		global $current_user;
		get_currentuserinfo();

		$subdomain = "";
		$username  = "";
		$token     = "";

		$client = new ZendeskAPI( $subdomain, $username );
		$client->setAuth( 'token', $token ); // set either token or password

		$newTicket = $client->tickets()->create( array(
				'subject'       => 'Test via Care Of Haus Support Plugin',
				'comment'       => array(
					'body' => $_REQUEST['message']
				),
				'priority'      => 'normal',
				'requester'     => array(
					'name'  => $current_user->display_name,
					'email' => $current_user->user_email
				),
				"via"           => array( "channel" => "Plugin Care Of Haus Support" ),
				"custom_fields" => array(
					array(
						'id'    => 'url',
						'value' => get_bloginfo()
					)
				)
			)
		);

		echo json_encode( $newTicket );

		exit;

	}

}
